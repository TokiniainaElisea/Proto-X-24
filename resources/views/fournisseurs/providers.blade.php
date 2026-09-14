@extends('layout')

@section('title', 'Liste des fournisseurs')

@section('content')
    <div class="container p-2">
        @if (session('success'))
            <div class="card-body bg-success text-light">
                {{ session('success') }}
            </div>
        @endif
        @if (session('failure'))
            <div class="card-body bg-danger text-light">
                {{ session('failure') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    <i class="bi bi-truck text-primary me-2"></i>
                    Gestion des fournisseurs
                </h2>

                <small class="text-muted">
                    Gérez les fournisseurs et leurs informations de contact.
                </small>

            </div>

            <a href="{{ route('new_privider_form') }}" class="btn btn-success">

                <i class="bi bi-plus-circle-fill me-1"></i>
                Nouveau fournisseur

            </a>

        </div>
        @include('fournisseurs.parts.filter_provider')
        @include('fournisseurs.parts.provider_table')
    </div>
@endsection
