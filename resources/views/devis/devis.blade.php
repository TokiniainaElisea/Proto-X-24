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
                    <i class="bi bi-receipt text-primary me-2"></i>
                    Devis
                </h2>

                <small class="text-muted">
                    Consultez, recherchez et gérez les devis de votre magasin.
                </small>

            </div>

            <a href="{{ route('new_devis') }}" class="btn btn-success">

                <i class="bi bi-plus-circle-fill me-1"></i>

                Nouveau devis

            </a>

        </div>
        @include('devis.filter_devis')
        @include('devis.list_devis')
    </div>
@endsection