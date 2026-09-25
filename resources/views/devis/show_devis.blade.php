@extends('layout')

@section('title', 'Détails de la vente')

@section('content')

    <div class="container">

        {{-- En-tête --}}
        <div class="d-flex justify-content-between align-items-center mb-3">

            <div>

                <a href="{{ route('devis') }}" class="btn btn-outline-secondary mb-2">

                    <i class="bi bi-arrow-left me-1"></i>
                    Retour

                </a>

                <h2 class="fw-bold mb-0">

                    <i class="bi bi-receipt-cutoff text-primary me-2"></i>

                    Détails du devis

                </h2>

                <small class="text-muted">

                    Devis :
                    <strong>{{ $quote->quote_reference }}</strong>

                </small>

            </div>


            <div class="d-flex">

                @if ($isValidable && $quote->status == 'Validé' && $quote->status == 'Annulé')
                    <button class="btn btn-primary me-2" data-bs-target="#confirmValidateQuoteModalLabel"
                        data-bs-toggle="modal">
                        <i class="bi bi-check-circle-fill"> </i>
                        Valider
                    </button>
                @endif
                @if ($quote->status !== 'Validé')
                    <a href="" class="btn btn-danger me-2">
                        <i class="bi bi-x-circle-fill"></i>

                        Annuler
                    </a>
                @endif

                <a href="{{ route('download_devis', $quote) }}" class="btn btn-outline-primary">

                    <i class="bi bi-download me-1"></i>

                    Imprimer

                </a>

            </div>

        </div>


        {{-- Informations principales --}}
        <div class="row mb-3">

            {{-- Client --}}
            <div class="col-md-6 mb-3 mb-md-0">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-dark text-white">

                        <i class="bi bi-person-fill text-primary me-2"></i>

                        Informations du client

                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">

                            <div>

                                <small class="text-muted d-block">
                                    Nom
                                </small>

                                <strong>

                                    {{ $quote->client->name ?? 'Non défini' }}
                                    {{ $quote->client->firstname ?? '' }}

                                </strong>

                            </div>

                            <div class="text-end">

                                <small class="text-muted d-block">
                                    N° client
                                </small>

                                <strong>

                                    {{ $quote->client->client_number ?? 'Non défini' }}

                                </strong>

                            </div>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <div>

                                <small class="text-muted d-block">
                                    Téléphone
                                </small>

                                <span>

                                    <i class="bi bi-telephone text-success me-1"></i>

                                    {{ $quote->client->phone ? '0' . $quote->client->phone : 'Indisponible' }}

                                </span>

                            </div>


                            <div class="text-end">

                                <small class="text-muted d-block">
                                    Ville
                                </small>

                                <span>

                                    <i class="bi bi-geo-alt text-danger me-1"></i>

                                    {{ $quote->client->town ?? 'Indisponible' }}

                                </span>

                            </div>

                        </div>


                        <div>

                            <small class="text-muted d-block">
                                Adresse
                            </small>

                            <span>

                                {{ $quote->client->adress ?? 'Indisponible' }}

                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Résumé vente --}}
            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-dark text-white">

                        <i class="bi bi-info-circle-fill text-info me-2"></i>

                        Informations sur le devis

                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">

                            <div>

                                <small class="text-muted d-block">
                                    N°
                                </small>

                                <strong>
                                    {{ $quote->quote_reference }}
                                </strong>

                            </div>


                            <div class="text-end">

                                <small class="text-muted d-block">
                                    Date
                                </small>

                                <strong>
                                    {{ $quote->created_at }}
                                </strong>

                            </div>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <div>

                                <small class="text-muted d-block">
                                    Mode de paiement
                                </small>

                                <span class="badge bg-primary">

                                    <i class="bi bi-credit-card me-1"></i>

                                    {{ $quote->payment_method ?? 'Non défini' }}

                                </span>

                            </div>


                            <div class="text-end">

                                <small class="text-muted d-block">
                                    Nombre de produits
                                </small>

                                <strong>
                                    {{ $quote->devis_details->sum('quantity') }}
                                </strong>

                                <small class="text-muted">
                                    article(s)
                                </small>

                            </div>

                        </div>

                        <div class="d-flex mb-3 justify-content-between align-items-center">
                            <span class="fw-semibold">
                                Statut
                            </span>
                            @if ($quote->status == 'En cours')
                                <span class="badge bg-success fs-6">

                                    <i class="bi bi-check-circle-fill"></i>

                                    {{ $quote->status }}

                                </span>
                            @endif

                            @if ($quote->status == 'Annulé')
                                <span class="badge bg-danger fs-6">

                                    <i class="bi bi-x-circle-fill"></i>

                                    {{ $quote->status }}

                                </span>
                            @endif
                        </div>


                        <div class="d-flex justify-content-between align-items-center">

                            <span class="fw-semibold">
                                Total
                            </span>

                            <span class="badge bg-success fs-5">

                                {{ number_format($quote->total_price, 0, ',', ' ') }} Ar

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Produits --}}
        <div class="card border-0 shadow-sm mb-3">

            <div class="card-header bg-dark text-white">

                <i class="bi bi-cart-check-fill text-success me-2"></i>

                Produits

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>Produit</th>

                                <th>Référence</th>

                                <th class="text-center">
                                    Prix unitaire
                                </th>

                                <th class="text-center">
                                    Quantité
                                </th>

                                <th class="text-center">
                                    Remise
                                </th>

                                <th class="text-end">
                                    Sous-total
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($quote->devis_details as $detail)
                                @php

                                    $unitPrice = $detail->price ?? $detail->product->price;

                                    $quantity = $detail->quantity;

                                    $lineTotal = $unitPrice * $quantity;

                                    $lineDiscount = $detail->line_discount ?? 0;

                                    $discountAmount = $lineDiscount;

                                    $lineTotalAfterDiscount = $lineTotal - $discountAmount;

                                @endphp


                                <tr>

                                    {{-- Produit --}}
                                    <td>

                                        <div class="d-flex align-items-center">

                                            @if ($detail->product->image_path ?? false)
                                                <img src="{{ asset($detail->product->image_path) }}" alt="product"
                                                    class="rounded me-2" style="width:45px;height:45px;object-fit:cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center me-2"
                                                    style="width:45px;height:45px;">

                                                    <i class="bi bi-box text-muted"></i>

                                                </div>
                                            @endif


                                            <strong>

                                                {{ $detail->product->name_product ?? 'Produit supprimé' }}

                                            </strong>

                                        </div>

                                    </td>


                                    {{-- Référence --}}
                                    <td>

                                        {{ $detail->product->reference ?? '---' }}

                                    </td>


                                    {{-- Prix unitaire --}}
                                    <td class="text-center">

                                        {{ number_format($unitPrice, 0, ',', ' ') }} Ar

                                    </td>


                                    {{-- Quantité --}}
                                    <td class="text-center">

                                        <span class="badge bg-info text-dark">

                                            {{ $quantity }}

                                        </span>

                                    </td>


                                    {{-- Remise --}}
                                    <td class="text-center">

                                        @if ($lineDiscount > 0)
                                            <small class="d-block text-danger mt-1">

                                                - {{ number_format($discountAmount, 0, ',', ' ') }} Ar

                                            </small>
                                        @else
                                            <span class="text-muted">

                                                —

                                            </span>
                                        @endif

                                    </td>


                                    {{-- Sous-total --}}
                                    <td class="text-end fw-semibold">

                                        @if ($lineDiscount > 0)
                                            <small class="text-muted text-decoration-line-through d-block">

                                                {{ number_format($lineTotal, 0, ',', ' ') }} Ar

                                            </small>
                                        @endif

                                        <span class="{{ $lineDiscount > 0 ? 'text-success' : '' }}">

                                            {{ number_format($lineTotalAfterDiscount, 0, ',', ' ') }}
                                            Ar

                                        </span>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- Partie financière --}}
        <div class="row mb-3">

            {{-- Remises par ligne --}}
            <div class="col-md-6 mb-3 mb-md-0">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-dark text-white">

                        <i class="bi bi-percent text-warning me-2"></i>

                        Remises appliquées

                    </div>


                    <div class="card-body">

                        @php

                            $totalDiscount = $quote->devis_details->sum(function ($detail) {
                                return $detail->line_discount;
                            });

                            $hasDiscount = $totalDiscount > 0;

                        @endphp


                        @if ($hasDiscount)
                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <span class="text-muted">
                                    Total des remises
                                </span>

                                <span class="badge bg-warning text-dark fs-6">

                                    - {{ number_format($totalDiscount, 0, ',', ' ') }} Ar

                                </span>

                            </div>


                            <hr>


                            <div class="small text-muted">

                                <i class="bi bi-info-circle me-1"></i>

                                Les remises sont appliquées individuellement
                                sur les lignes de la vente.

                            </div>
                        @else
                            <div class="text-muted">

                                <i class="bi bi-dash-circle me-1"></i>

                                Aucune remise appliquée.

                            </div>
                        @endif

                    </div>

                </div>

            </div>


            {{-- Paiement / total --}}
            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-dark text-white">

                        <i class="bi bi-cash-stack text-success me-2"></i>

                        Résumé financier

                    </div>


                    <div class="card-body">

                        @php

                            $subtotal = $quote->devis_details->sum(function ($detail) {
                                $unitPrice = $detail->price ?? $detail->product->price;

                                return $unitPrice * $detail->quantity;
                            });

                        @endphp


                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                Sous-total
                            </span>

                            <strong>

                                {{ number_format($subtotal, 0, ',', ' ') }} Ar

                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                Remises
                            </span>

                            <strong class="text-danger">

                                @if ($totalDiscount > 0)
                                    - {{ number_format($totalDiscount, 0, ',', ' ') }} Ar
                                @else
                                    0 Ar
                                @endif

                            </strong>

                        </div>


                        <hr>


                        <div class="d-flex justify-content-between align-items-center">

                            <strong>
                                Total à payer
                            </strong>

                            <span class="badge bg-success fs-5">

                                {{ number_format($quote->total_price, 0, ',', ' ') }} Ar

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Note --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-dark text-white">

                <i class="bi bi-chat-left-text-fill text-info me-2"></i>

                Note

            </div>


            <div class="card-body">

                @if (!empty($quote->note))
                    <div class="alert alert-light border mb-0">

                        <i class="bi bi-quote text-primary me-2"></i>

                        {{ $quote->note }}

                    </div>
                @else
                    <span class="text-muted">

                        <i class="bi bi-dash-circle me-1"></i>

                        Aucune note.

                    </span>
                @endif

            </div>

        </div>

    </div>

    @include('devis.parts.validate_devis', [
        'id' => 'confirmValidateQuoteModalLabel',
    ])

@endsection
