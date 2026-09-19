@extends('layout')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="card-body bg-success text-light mb-2">
                {{ session('success') }}
            </div>
        @endif
        @if (session('failure'))
            <div class="card-body bg-danger text-light mb-2">
                {{ session('failure') }}
            </div>
        @endif

        {{-- En-tête --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">

                    <i class="bi bi-cart-plus-fill text-success me-2"></i>
                    Nouvelle vente

                </h2>

                <small class="text-muted">

                    Créez une nouvelle commande et renseignez les informations du client.

                </small>

            </div>

            <a href="{{ route('ventes') }}" class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Retour aux ventes

            </a>

        </div>


        {{-- Création de la commande --}}
        <livewire:order-page />

    </div>
@endsection
