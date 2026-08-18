@extends('layout')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="card-body bg-success text-light">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    <i class="bi bi-cart-check-fill text-primary me-2"></i>
                    Ventes
                </h2>

                <small class="text-muted">
                    Consultez, recherchez et gérez les ventes de votre magasin.
                </small>

            </div>

            <a href="{{ route('new_vente') }}" class="btn btn-success">

                <i class="bi bi-plus-circle-fill me-1"></i>

                Nouvelle vente

            </a>

        </div>
        @include('ventes.parts.filter')
        @include('ventes.parts.liste_ventes')
    </div>
@endsection
