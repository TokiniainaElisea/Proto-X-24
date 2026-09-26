<?php
namespace App\Http\Controllers;

use App\Http\Requests\DevisFilterRequest;
use App\Models\Company;
use App\Models\Devis;
use App\Models\Numbering;
use App\Models\SaleDetail;
use App\Models\Sales;
use App\Models\Stock\Mouvement;
use Illuminate\Support\Facades\DB;

class DevisController extends Controller
{

    public Devis $quote;
    //index
    public function index(DevisFilterRequest $request)
    {
        $quotes = Devis::with(['devis_details', 'client']);

        // Filtre par période
        if ($request->filled('begin') && $request->filled('ending')) {
            $quotes->whereBetween('created_at', [
                $request->begin . ' 00:00:00',
                $request->ending . ' 23:59:59',
            ]);
        }

        // Numéro de commande
        if ($request->filled('quote_reference')) {
            $quotes->where('quote_reference', 'LIKE', '%' . $request->quote_reference . '%');
        }

        // Montant
        if ($request->filled('montant')) {
            $quotes->where('total_price', $request->montant);
        }

        // Nom du client
        if ($request->filled('name_client')) {
            $quotes->whereHas('client', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name_client . '%');
            });
        }
        return view('devis.devis', [
            'quotes' => $quotes->latest()->paginate(10),
        ]);
    }

    //new devis
    public function new_devis()
    {
        return view('devis.new_devis');
    }

    //show devis
    public function show_devis(Devis $quote)
    {
        $isValidable = true;

        foreach ($quote->devis_details as $value) {

            $quantityToRemove = (int) $value['quantity'];

            /*
         * On récupère les entrées de stock du produit
         * de la plus ancienne à la plus récente.
         */
            $mouvements = Mouvement::where('product_id', $value['product_id'])
                ->where('in_stock', '>', 0)
                ->orderBy('enter_date', 'asc')
                ->orderBy('id', 'asc')
                ->get();

            /*
         * Vérification du stock disponible.
         */
            $totalStock = $mouvements->sum('in_stock');

            if ($totalStock < $quantityToRemove) {

                $isValidable = false;

                // Inutile de continuer si un seul produit est insuffisant.
                break;
            }
        }

        return view('devis.show_devis', [
            'quote'       => $quote,
            'isValidable' => $isValidable,
        ]);
    }

    //donwload devis
    public function download_devis(Devis $quote)
    {

        $company = Company::first();

        return view('devis.devis_pdf', [
            'quote'   => $quote,
            'company' => $company,
        ]);
    }

    //validation d'un devis
    public function validate_devis(Devis $quote)
    {
        $this->quote = Devis::find($quote->id)->load(['client', 'devis_details']);
        DB::transaction(function () {
            // Création de la vente
            $order = Sales::create([
                'client_id'      => $this->quote->client->id,
                'status'         => 'En cours',
                'total_price'    => $this->quote->total_price,
                'note'           => $this->quote->note . ' ' . $this->quote->quote_reference,
                'payment_method' => $quote->payment_method ?? 'Cash',
            ]);
            $salePrefix = Numbering::first() ?? 'CMD';
            if (is_string($salePrefix)) {
                $order->update([
                    'sale_reference' => $salePrefix . $order->id,
                ]);
            } else {
                $order->update([
                    'sale_reference' => $salePrefix->order_prefix . $order->id,
                ]);
            }

            // Parcours des produits du panier
            foreach ($this->quote->devis_details as $value) {
                $cost_price       = 0;
                $quantityToRemove = (int) $value['quantity'];

                /*
                 * On récupère les entrées de stock du produit
                 * de la plus ancienne à la plus récente.
                 */
                $mouvements = Mouvement::where('product_id', $value['product_id'])->where('in_stock', '>', 0)->orderBy('enter_date', 'asc')->orderBy('id', 'asc')->lockForUpdate()->get();

                // Vérification du stock disponible
                $totalStock = $mouvements->sum('in_stock');

                if ($totalStock < $quantityToRemove) {
                    throw new \Exception('Stock insuffisant pour le produit : ' . $value['name_product']);
                }

                /*
                 * Décrémentation FIFO
                 */
                foreach ($mouvements as $mouvement) {
                    if ($quantityToRemove <= 0) {
                        break;
                    }

                    $available = $mouvement->in_stock;

                    if ($available >= $quantityToRemove) {
                        // Cette entrée suffit à couvrir la vente
                        $mouvement->decrement('in_stock', $quantityToRemove);

                        $quantityToRemove = 0;
                        $cost_price       = $mouvement->provider_price;
                    } else {
                        // On consomme entièrement cette entrée
                        $mouvement->update([
                            'in_stock' => 0,
                        ]);

                        $quantityToRemove -= $available;
                        $cost_price        = $mouvement->provider_price;
                    }
                }

                // Création du détail de vente
                SaleDetail::create([
                    'sales_id'      => $order->id,
                    'product_id'    => $value['product_id'],
                    'quantity'      => $value['quantity'],
                    'unit_price'    => $value['unit_price'],
                    'total_line'    => ($value['quantity'] * $value['unit_price']) - $value['line_discount'],
                    'cost_price'    => $cost_price * $value['quantity'],
                    'line_discount' => $value['line_discount'],
                ]);

                //mise à jour du status du devis
                $this->quote->update([
                    'status' => 'Validé',
                ]);
            }
        });

        return to_route('ventes')->with('success', 'Et une vente de plus');
    }

    public function cancel_devis(Devis $quote){
        //je recharge au cas où
        $_quote = Devis::find($quote->id);
        $quote->update([
            'status' => 'Annulé'
        ]);

        return to_route('devis')->with('success', 'Devis annulé');
    }
}
