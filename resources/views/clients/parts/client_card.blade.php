@extends('layout')

@section('content')
    <div class="container p-2">

        {{-- En-tête --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="d-flex align-items-center">

                <div class="bg-primary bg-opacity-10 rounded-3
                        d-flex align-items-center justify-content-center me-3"
                    style="width: 52px; height: 52px;">

                    <i class="bi bi-person-vcard-fill text-primary fs-3"></i>

                </div>

                <div>

                    <h2 class="fw-bold mb-0">
                        Fiche client
                    </h2>

                    <small class="text-muted">
                        Informations et activité du client
                    </small>

                </div>

            </div>

            <a href="{{ route('client') }}" class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Retour

            </a>

        </div>


        <div class="row g-4">

            {{-- ========================= --}}
            {{-- IDENTITÉ DU CLIENT --}}
            {{-- ========================= --}}

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-dark text-white">

                        <h5 class="mb-0">

                            <i class="bi bi-person-fill me-2"></i>
                            Informations du client

                        </h5>

                    </div>

                    <div class="card-body">

                        {{-- Identité --}}
                        <div class="d-flex align-items-center mb-4">

                            <div class="rounded-circle bg-primary bg-opacity-10
                                    d-flex align-items-center justify-content-center me-3"
                                style="width: 70px; height: 70px;">

                                @if ($client->client_type === 'société')
                                    <i class="bi bi-building-fill text-primary fs-2"></i>
                                @else
                                    <i class="bi bi-person-fill text-primary fs-2"></i>
                                @endif

                            </div>

                            <div>

                                <div class="d-flex align-items-center gap-2">

                                    <h4 class="fw-bold mb-0">

                                        {{ $client->name }}

                                        @if ($client->firstname)
                                            {{ $client->firstname }}
                                        @endif

                                    </h4>

                                    @if ($client->client_type === 'société')
                                        <span class="badge bg-info">

                                            <i class="bi bi-building me-1"></i>
                                            Société

                                        </span>
                                    @else
                                        <span class="badge bg-secondary">

                                            <i class="bi bi-person me-1"></i>
                                            Particulier

                                        </span>
                                    @endif

                                </div>

                                <small class="text-muted">

                                    <i class="bi bi-person-vcard me-1"></i>

                                    N° client :
                                    <strong>{{ $client->client_number }}</strong>

                                </small>

                            </div>

                        </div>


                        <hr>


                        {{-- Informations --}}
                        <div class="row g-4 mt-1">

                            {{-- Nom --}}
                            <div class="col-md-6">

                                <div class="text-muted small mb-1">

                                    <i class="bi bi-person me-1 text-primary"></i>
                                    Nom

                                </div>

                                <strong>
                                    {{ $client->name ?: 'Non renseigné' }}
                                </strong>

                            </div>


                            {{-- Prénom --}}
                            <div class="col-md-6">

                                <div class="text-muted small mb-1">

                                    <i class="bi bi-person-badge me-1 text-primary"></i>
                                    Prénom

                                </div>

                                <strong>

                                    {{ $client->firstname ?: 'Non renseigné' }}

                                </strong>

                            </div>


                            {{-- Téléphone --}}
                            <div class="col-md-6">

                                <div class="text-muted small mb-1">

                                    <i class="bi bi-telephone-fill me-1 text-success"></i>
                                    Téléphone

                                </div>

                                @if ($client->phone)
                                    <strong>
                                        {{ '0' . $client->phone }}
                                    </strong>
                                @else
                                    <span class="text-muted">
                                        Non renseigné
                                    </span>
                                @endif

                            </div>


                            {{-- Ville --}}
                            <div class="col-md-6">

                                <div class="text-muted small mb-1">

                                    <i class="bi bi-geo-alt-fill me-1 text-danger"></i>
                                    Ville

                                </div>

                                <strong>

                                    {{ $client->town ?: 'Non renseignée' }}

                                </strong>

                            </div>


                            {{-- Type --}}
                            <div class="col-md-6">

                                <div class="text-muted small mb-1">

                                    <i class="bi bi-diagram-3-fill me-1 text-info"></i>
                                    Type de client

                                </div>

                                <strong>

                                    {{ ucfirst($client->client_type) }}

                                </strong>

                            </div>


                            {{-- Numéro client --}}
                            <div class="col-md-6">

                                <div class="text-muted small mb-1">

                                    <i class="bi bi-hash me-1 text-secondary"></i>
                                    Référence client

                                </div>

                                <span class="badge bg-light text-dark border">

                                    {{ $client->client_number }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================= --}}
            {{-- RÉSUMÉ --}}
            {{-- ========================= --}}

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-dark text-white">

                        <h5 class="mb-0">

                            <i class="bi bi-bar-chart-fill me-2"></i>
                            Résumé

                        </h5>

                    </div>

                    <div class="card-body">

                        {{-- Nombre de ventes --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <div>

                                <div class="text-muted small">
                                    Nombre de ventes
                                </div>

                                <div class="fs-3 fw-bold text-primary">

                                    {{ $client->sales->count() }}

                                </div>

                            </div>

                            <div class="fs-1 text-primary">

                                <i class="bi bi-cart-check-fill"></i>

                            </div>

                        </div>


                        {{-- CA --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <div>

                                <div class="text-muted small">
                                    Total des achats
                                </div>

                                <div class="fs-3 fw-bold text-success">

                                    {{ number_format($client->sales->sum('total_price'), 0, ',', ' ') }}

                                    <small class="fs-6">
                                        Ar
                                    </small>

                                </div>

                            </div>

                            <div class="fs-1 text-success">

                                <i class="bi bi-cash-stack"></i>

                            </div>

                        </div>


                        {{-- Panier moyen --}}
                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <div class="text-muted small">
                                    Panier moyen
                                </div>

                                <div class="fs-4 fw-bold text-warning">

                                    {{ $client->sales->count() ? number_format($client->sales->avg('total_price'), 0, ',', ' ') : 0 }}

                                    <small class="fs-6">
                                        Ar
                                    </small>

                                </div>

                            </div>

                            <div class="fs-1 text-warning">

                                <i class="bi bi-basket2-fill"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================= --}}
            {{-- HISTORIQUE DES VENTES --}}
            {{-- ========================= --}}

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div
                        class="card-header bg-dark text-white
                            d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">

                            <i class="bi bi-clock-history me-2"></i>
                            Historique des ventes

                        </h5>

                        <span class="badge bg-primary">

                            {{ $client->sales->count() }}
                            vente(s)

                        </span>

                    </div>


                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                    <tr>

                                        <th class="ps-3">
                                            Référence
                                        </th>

                                        <th>
                                            Date
                                        </th>

                                        <th>
                                            Mode de paiement
                                        </th>

                                        <th class="text-end">
                                            Remise
                                        </th>

                                        <th class="text-end">
                                            Total
                                        </th>

                                        <th class="text-center">
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse ($client->sales->sortByDesc('created_at') as $sale)
                                        <tr>

                                            <td class="ps-3">

                                                <span class="badge bg-light text-dark border">

                                                    <i class="bi bi-receipt me-1"></i>

                                                    {{ $sale->sale_reference }}

                                                </span>

                                            </td>


                                            <td>

                                                <i class="bi bi-calendar3 me-1 text-muted"></i>

                                                {{ $sale->created_at->format('d/m/Y H:i') }}

                                            </td>


                                            <td>

                                                @if ($sale->payment_method === 'Cash')
                                                    <span
                                                        class="badge bg-success bg-opacity-10
                                                             text-success">

                                                        <i class="bi bi-cash me-1"></i>
                                                        Cash

                                                    </span>
                                                @else
                                                    <span
                                                        class="badge bg-primary bg-opacity-10
                                                             text-primary">

                                                        {{ $sale->payment_method }}

                                                    </span>
                                                @endif

                                            </td>


                                            <td class="text-end">

                                                @if ($sale->discount > 0)
                                                    <span class="text-danger">

                                                        - {{ number_format($sale->discount, 0, ',', ' ') }}
                                                        Ar

                                                    </span>
                                                @else
                                                    <span class="text-muted">
                                                        —
                                                    </span>
                                                @endif

                                            </td>


                                            <td class="text-end fw-bold">

                                                {{ number_format($sale->total_price, 0, ',', ' ') }}
                                                Ar

                                            </td>


                                            <td class="text-center">

                                                <a href="{{ route('show_vente', $sale) }}"
                                                    class="btn btn-info btn-sm text-white" title="Voir les détails">

                                                    <i class="bi bi-eye-fill"></i>

                                                </a>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="6" class="text-center py-5">

                                                <i class="bi bi-cart-x text-muted" style="font-size: 2.5rem;"></i>

                                                <h6 class="fw-bold mt-3">
                                                    Aucune vente
                                                </h6>

                                                <small class="text-muted">
                                                    Ce client n'a encore effectué aucun achat.
                                                </small>

                                            </td>

                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
