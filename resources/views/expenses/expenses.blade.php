@extends('layout')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="card-body bg-success text-light p-2">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <div class="d-flex align-items-center mb-1">

                    <div class="rounded-3 bg-primary bg-opacity-10
                       d-flex align-items-center justify-content-center me-3"
                        style="width: 48px; height: 48px;">

                        <i class="bi bi-cash-stack text-primary fs-3"></i>

                    </div>

                    <div>

                        <h2 class="fw-bold mb-0">
                            Dépenses
                        </h2>

                        <small class="text-muted">
                            Suivez et gérez les dépenses de votre activité
                        </small>

                    </div>

                </div>

            </div>


            <div>

                {{-- Bouton d'ouverture du modal --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createExpenseModal">
                    <i class="bi bi-plus-lg me-1"></i>
                    Nouvelle dépense
                </button>

            </div>

        </div>
        @include('expenses.expenses_filter')
        @include('expenses.expenses_list')
        @include('expenses.new_expense', [
            'id' =>'createExpenseModal'
        ])
    </div>
@endsection
