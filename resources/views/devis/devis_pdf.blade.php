<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">

    <title>Devis {{ $quote->sale_reference }}</title>

    <link href="" rel="stylesheet">

    <style>
        body {
            background: #f1f3f5;
            font-family: Arial, Helvetica, sans-serif;
            color: #000000;
        }

        .invoice-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 50px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
        }

        .invoice-title {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .company-name {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .invoice-meta {
            font-size: .9rem;
        }

        .table tbody td {
            padding: 13px 12px;
            vertical-align: middle;
        }

        .total-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
        }

        .grand-total {
            font-size: 1rem;
            font-weight: 800;
        }

        .footer {
            border-top: 1px solid #dee2e6;
            margin-top: 50px;
            padding-top: 20px;
            font-size: .8rem;
            color: #0a0100fb;
        }

        @media print {

            .invoice-container {
                margin: 0;
                max-width: none;
                box-shadow: none;
                padding: 10px;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <div class="invoice-container">

        {{-- EN-TÊTE --}}

        <div class="row align-items-start mb-2">

            {{-- Informations société --}}
            <div class="col-7">

                <div class="company-name mb-1">
                    {{ $company->name }}
                </div>

                @if ($company->legal_name)
                    <div class="text-dark">
                        {{ $company->legal_name }}
                    </div>
                @endif

                @if ($company->address)
                    <div class="text-dark mt-2">
                        {{ $company->address }}
                    </div>
                @endif

                @if ($company->phone)
                    <div class="text-dark">
                        Tél. : {{ $company->phone }}
                    </div>
                @endif

                <div class="mt-3 small">

                    @if ($company->nif)
                        <div>
                            <strong>NIF :</strong> {{ $company->nif }}
                        </div>
                    @endif

                    @if ($company->stat)
                        <div>
                            <strong>STAT :</strong> {{ $company->stat }}
                        </div>
                    @endif

                    @if ($company->rcs)
                        <div>
                            <strong>RCS :</strong> {{ $company->rcs }}
                        </div>
                    @endif

                </div>

            </div>


            {{-- Facture --}}
            <div class="col-5 text-end">

                <div class="invoice-title text-primary">
                    Devis
                </div>

                <div class="invoice-meta mt-2">

                    <div>
                        <strong>N° :</strong>
                        {{ $quote->quote_reference }}
                    </div>

                    <div>
                        <strong>Date :</strong>
                        {{ $quote->created_at->format('d/m/Y') }}
                    </div>

                </div>

            </div>

        </div>


        {{-- CLIENT --}}

        <div class="border rounded p-3 mb-2 border-dark">

            <div class="text-dark small text-uppercase fw-bold mb-2">
                Adréssé à
            </div>

            <div class="fw-bold fs-5">

                {{ $quote->client->title }}
                {{ $quote->client->name }}
                {{ $quote->client->firstname }}

            </div>

            @if ($quote->client->address)
                <div class="text-dark mt-1">
                    {{ $quote->client->address }}
                </div>
            @endif

            @if ($quote->client->town)
                <div class="text-dark">
                    {{ $quote->client->town }}
                </div>
            @endif

            @if ($quote->client->phone)
                <div class="text-dark">
                    Tél. : {{ $quote->client->phone }}
                </div>
            @endif

        </div>


        {{-- PRODUITS --}}

        <div class="table-responsive">

            <table class="table table-bordered align-middle border border-dark">

                <thead>

                    <tr class="text-dark">

                        <th>
                            Désignation
                        </th>

                        <th class="text-center" style="width: 50px;">
                            Qté
                        </th>

                        <th class="text-end" style="width: 160px;">
                            PU
                        </th>

                        <th class="text-end" style="width:160px">
                            Remise
                        </th>

                        <th class="text-end" style="width: 160px;">
                            Total
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($quote->devis_details as $detail)
                        <tr>

                            <td>

                                <div class="fw-semibold">
                                    {{ $detail->product->name_product }}
                                </div>

                                @if ($detail->product->reference)
                                    <small class="text-dark">
                                        Réf. {{ $detail->product->reference }}
                                    </small>
                                @endif

                            </td>

                            <td class="text-center">
                                {{ $detail->quantity }}
                            </td>

                            <td class="text-end">
                                {{ number_format($detail->unit_price, 0, ',', ' ') }}
                                Ar
                            </td>

                            <td class="text-end text-danger">
                                - {{ number_format($detail->line_discount, 0, ',', ' ') }} Ar
                            </td>

                            <td class="text-end fw-semibold">
                                {{ number_format($detail->total_line, 0, ',', ' ') }}
                                Ar
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>


        {{-- BAS DE FACTURE --}}

        <div class="row justify-content-end mt-4">

            <div class="col-md-5">

                <div class="total-box">

                    @php

                        $subtotal = $quote->devis_details->sum('total_line') + $quote->devis_details->sum('line_discount');

                    @endphp

                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-dark">
                            Sous-total
                        </span>

                        <span>
                            {{ number_format($subtotal, 0, ',', ' ') }} Ar
                        </span>

                    </div>

                    @if ($quote->devis_details->sum('line_discount') > 0)
                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-dark">
                                Remise total
                            </span>

                            <span class="text-danger">
                                -
                                {{ number_format($quote->devis_details->sum('line_discount'), 0, ',', ' ') }}
                                Ar
                            </span>

                        </div>
                    @endif
                        

                    <hr>


                    <div class="d-flex justify-content-between align-items-center">

                        <span class="fw-bold">
                            TOTAL
                        </span>

                        <span class="grand-total text-primary">
                            {{ number_format($quote->total_price, 0, ',', ' ') }}
                            Ar
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- INFORMATIONS SUPPLÉMENTAIRES --}}
        <div class="row mt-4">

            <div class="col-md-6">

                <div class="small text-dark">

                    <strong class="text-dark">
                        Mode de paiement
                    </strong>

                    <div class="mt-1">
                        {{ $quote->payment_method }}
                    </div>

                </div>

            </div>


            @if ($quote->note)
                <div class="col-md-6">

                    <div class="small text-dark">

                        <strong class="text-dark">
                            Note
                        </strong>

                        <div class="mt-1">
                            {{ $quote->note }}
                        </div>

                    </div>

                </div>
            @endif

        </div>
        {{-- FOOTER --}}

        <div class="footer text-center text-dark">

            <div class="fw-semibold mb-1">
                Merci pour votre confiance.
            </div>

            <div>
                {{ $company->name }}
                — Devis {{ $quote->sale_reference }}
            </div>

        </div>

        <div class="text-center mt-4 no-print">
            <a href="{{ route('show_devis', $quote) }}" class="btn btn-outline-warning px-4"> <i
                    class="bi bi-arrow-left"></i> Retour </a>

            <button onclick="window.print()" class="btn btn-dark px-4 me-3">

                Imprimer / Enregistrer en PDF

            </button>

        </div>

    </div>

</body>

</html>
