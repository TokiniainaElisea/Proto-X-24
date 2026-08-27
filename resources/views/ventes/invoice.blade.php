<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">

    <title>Facture {{ $sale->sale_reference }}</title>

    <link href="" rel="stylesheet">

    <style>
        body {
            background: #f1f3f5;
            font-family: Arial, Helvetica, sans-serif;
            color: #212529;
        }

        .invoice-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 50px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
        }

        .invoice-title {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .company-name {
            font-size: 1.35rem;
            font-weight: 700;
        }

        .invoice-meta {
            font-size: .9rem;
        }

        .table thead th {
            background: #212529 !important;
            color: white !important;
            border: none;
            padding: 12px;
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
            font-size: 1.5rem;
            font-weight: 800;
        }

        .footer {
            border-top: 1px solid #dee2e6;
            margin-top: 50px;
            padding-top: 20px;
            font-size: .8rem;
            color: #6c757d;
        }

        @media print {

            body {
                background: white;
            }

            .invoice-container {
                margin: 0;
                max-width: none;
                box-shadow: none;
                padding: 20px;
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

        <div class="row align-items-start mb-5">

            {{-- Informations société --}}
            <div class="col-7">

                <div class="company-name mb-2">
                    {{ $company->name }}
                </div>

                @if ($company->legal_name)
                    <div class="text-muted">
                        {{ $company->legal_name }}
                    </div>
                @endif

                @if ($company->address)
                    <div class="text-muted mt-2">
                        {{ $company->address }}
                    </div>
                @endif

                @if ($company->phone)
                    <div class="text-muted">
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
                    Facture
                </div>

                <div class="invoice-meta mt-2">

                    <div>
                        <strong>N° :</strong>
                        {{ $sale->sale_reference }}
                    </div>

                    <div>
                        <strong>Date :</strong>
                        {{ $sale->created_at->format('d/m/Y') }}
                    </div>

                </div>

                <div class="mt-3">

                    <span class="badge bg-success px-3 py-2">
                        PAYÉE
                    </span>

                </div>

            </div>

        </div>


        {{-- CLIENT --}}

        <div class="border rounded p-3 mb-4">

            <div class="text-muted small text-uppercase fw-bold mb-2">
                Facturé à
            </div>

            <div class="fw-bold fs-5">

                {{ $sale->client->title }}
                {{ $sale->client->name }}
                {{ $sale->client->firstname }}

            </div>

            @if ($sale->client->address)
                <div class="text-muted mt-1">
                    {{ $sale->client->address }}
                </div>
            @endif

            @if ($sale->client->town)
                <div class="text-muted">
                    {{ $sale->client->town }}
                </div>
            @endif

            @if ($sale->client->phone)
                <div class="text-muted">
                    Tél. : {{ $sale->client->phone }}
                </div>
            @endif

        </div>


        {{-- PRODUITS --}}

        <div class="table-responsive">

            <table class="table table-bordered align-middle">

                <thead>

                    <tr>

                        <th>
                            Désignation
                        </th>

                        <th class="text-center" style="width: 100px;">
                            Qté
                        </th>

                        <th class="text-end" style="width: 160px;">
                            Prix unitaire
                        </th>

                        <th class="text-end" style="width: 170px;">
                            Total
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($sale->saledetail as $detail)
                        <tr>

                            <td>

                                <div class="fw-semibold">
                                    {{ $detail->product->name }}
                                </div>

                                @if ($detail->product->reference)
                                    <small class="text-muted">
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

                        $subtotal = $sale->saledetail->sum('total_line');

                    @endphp

                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">
                            Sous-total
                        </span>

                        <span>
                            {{ number_format($subtotal, 0, ',', ' ') }} Ar
                        </span>

                    </div>


                    @if ($sale->discount > 0)
                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-muted">
                                Remise
                            </span>

                            <span class="text-danger">
                                -
                                {{ number_format($sale->discount, 0, ',', ' ') }}
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
                            {{ number_format($sale->total_price, 0, ',', ' ') }}
                            Ar
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- INFORMATIONS SUPPLÉMENTAIRES --}}

        <div class="row mt-4">

            <div class="col-md-6">

                <div class="small text-muted">

                    <strong class="text-dark">
                        Mode de paiement
                    </strong>

                    <div class="mt-1">
                        {{ $sale->payment_method }}
                    </div>

                </div>

            </div>


            @if ($sale->note)
                <div class="col-md-6">

                    <div class="small text-muted">

                        <strong class="text-dark">
                            Note
                        </strong>

                        <div class="mt-1">
                            {{ $sale->note }}
                        </div>

                    </div>

                </div>
            @endif

        </div>


        {{-- FOOTER --}}

        <div class="footer text-center">

            <div class="fw-semibold mb-1">
                Merci pour votre confiance.
            </div>

            <div>
                {{ $company->name }}
                — Facture {{ $sale->sale_reference }}
            </div>

        </div>

        <div class="text-center mt-4 no-print">
            <a href="{{ route('show_vente', $sale) }}" class="btn btn-outline-warning px-4"> <i
                    class="bi bi-arrow-left"></i> Retour </a>

            <button onclick="window.print()" class="btn btn-dark px-4 me-3">

                Imprimer / Enregistrer en PDF

            </button>

        </div>

    </div>

</body>

</html>
