@extends('layout')

@section('content')
    <div class="container">
        {{-- En-tête --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">

                    <i class="bi bi-pencil-square text-warning me-2"></i>
                    Gestion du stock

                </h2>

                <small class="text-muted">

                    Modifiez et gérez votre stock

                </small>

            </div>

            <a href="{{route('show_product', $product) }}" class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Retour

            </a>

        </div>
        <div class="card shadow-sm my-3">
            @include('products.product.mouvement_modal')

            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-box-seam"></i>
                    Liste des entrées en stock
                </h5>

                <button class="btn btn-success" data-bs-target="#new_mouvement" data-bs-toggle="modal">
                    <i class="bi bi-plus-circle"></i>
                    Nouveau mouvement
                </button>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-hover table-bordered align-middle">

                    <thead>
                        <tr>
                            <th>Date d'entrée</th>
                            <th>Qté initiale</th>
                            <th>Stock actuel</th>
                            <th>Prix fournisseur</th>
                            <th width="160">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($stocks as $stock)
                            <tr>

                                <td>
                                    {{ \Carbon\Carbon::parse($stock['enter_date'])->format('d/m/Y') }}
                                </td>

                                <td>
                                    {{ $stock['initial_quantity'] }}
                                </td>

                                <td>

                                    @if ($stock['in_stock'] > 0)
                                        <span class="badge bg-success">
                                            {{ $stock['in_stock'] }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Rupture
                                        </span>
                                    @endif

                                </td>

                                <td>
                                    {{ number_format($stock['provider_price'], 2, ',', ' ') }} Ar
                                </td>

                                <td>

                                    <div class="btn-group">

                                        <button data-bs-target="{{ '#edit' . $stock['id'] }}" data-bs-toggle="modal"
                                            class="btn btn-warning btn-sm me-2">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <button class="btn btn-danger btn-sm" data-bs-target="{{ '#delete' . $stock['id'] }}"
                                            data-bs-toggle="modal">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                    @if ($stocks)
                                        @include('products.product.edit_mouvement', [
                                            'id' => 'edit' . $stock['id'],
                                            'stock' => $stock,
                                        ])
                                        @include('products.product.delete_mouvement', [
                                            'id' => 'delete' . $stock['id'],
                                            'stock' => $stock,
                                        ])
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center text-muted py-4">
                                    Aucun mouvement de stock enregistré.
                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>
                {{ $stocks->links() }}
            </div>

        </div>

    </div>
@endsection
