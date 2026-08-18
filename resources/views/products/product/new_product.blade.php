@extends('layout')
@section('title', 'Ajouter un nouveau produit')

@section('content')

<div class="container">

{{-- En-tête --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            <i class="bi bi-box-seam-fill text-primary me-2"></i>
            Nouveau produit
        </h2>

        <small class="text-muted">
            Ajoutez un produit à votre catalogue et renseignez son approvisionnement.
        </small>
    </div>

    <a href="{{ route('produits') }}"
       class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Retour

    </a>

</div>


<form method="post"
      action="{{ route('store_new_product') }}"
      enctype="multipart/form-data">

    @csrf


    {{-- Informations générales --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">
                <i class="bi bi-info-circle-fill me-2"></i>
                Informations générales
            </h5>

        </div>

        <div class="card-body p-4">

            <div class="row g-3">

                {{-- Image --}}
                <div class="col-md-4">

                    <label for="image_path"
                           class="form-label fw-semibold">

                        <i class="bi bi-image me-1 text-primary"></i>
                        Photo du produit

                    </label>

                    <input
                        type="file"
                        name="image_path"
                        id="image_path"
                        class="form-control @error('image_path') is-invalid @enderror">

                    @error('image_path')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Nom --}}
                <div class="col-md-8">

                    <label for="name_product"
                           class="form-label fw-semibold">

                        <i class="bi bi-box-seam me-1 text-primary"></i>
                        Nom du produit

                    </label>

                    <input
                        type="text"
                        name="name_product"
                        id="name_product"
                        class="form-control @error('name_product') is-invalid @enderror"
                        placeholder="Ex : T-shirt classique"
                        value="{{ old('name_product') }}">

                    @error('name_product')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Prix --}}
                <div class="col-md-6">

                    <label for="price"
                           class="form-label fw-semibold">

                        <i class="bi bi-cash-stack me-1 text-success"></i>
                        Prix de vente

                    </label>

                    <div class="input-group">

                        <input
                            type="number"
                            name="price"
                            id="price"
                            class="form-control @error('price') is-invalid @enderror"
                            placeholder="0"
                            value="{{ old('price') }}">

                        <span class="input-group-text">
                            Ar
                        </span>

                    </div>

                    @error('price')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Fournisseur --}}
                <div class="col-12">

                    <label for="id_provider"
                           class="form-label fw-semibold">

                        <i class="bi bi-truck me-1 text-info"></i>
                        Fournisseur

                    </label>

                    <select
                        name="id_provider"
                        id="id_provider"
                        class="form-select">

                        @foreach ($providers as $provider)

                            <option
                                value="{{ $provider->id }}"
                                {{ old('id_provider') == $provider->id ? 'selected' : '' }}>

                                {{ $provider->name_provider }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        </div>

    </div>


    {{-- Approvisionnement --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">
                <i class="bi bi-box-arrow-in-down me-2"></i>
                Approvisionnement
            </h5>

        </div>

        <div class="card-body p-4">

            <div class="row g-3">

                {{-- Date --}}
                <div class="col-md-4">

                    <label for="enter_date"
                           class="form-label fw-semibold">

                        <i class="bi bi-calendar-event me-1 text-primary"></i>
                        Date d'approvisionnement

                    </label>

                    <input
                        type="date"
                        name="enter_date"
                        id="enter_date"
                        class="form-control @error('enter_date') is-invalid @enderror"
                        value="{{ old('enter_date') }}">

                    @error('enter_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Quantité --}}
                <div class="col-md-4">

                    <label for="initial_quantity"
                           class="form-label fw-semibold">

                        <i class="bi bi-boxes me-1 text-info"></i>
                        Quantité initiale

                    </label>

                    <input
                        type="number"
                        name="initial_quantity"
                        id="initial_quantity"
                        class="form-control @error('initial_quantity') is-invalid @enderror"
                        placeholder="0"
                        value="{{ old('initial_quantity') }}">

                    @error('initial_quantity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Prix fournisseur --}}
                <div class="col-md-4">

                    <label for="provider_price"
                           class="form-label fw-semibold">

                        <i class="bi bi-cash-coin me-1 text-success"></i>
                        Prix fournisseur

                    </label>

                    <div class="input-group">

                        <input
                            type="number"
                            name="provider_price"
                            id="provider_price"
                            class="form-control @error('provider_price') is-invalid @enderror"
                            placeholder="0"
                            value="{{ old('provider_price') }}">

                        <span class="input-group-text">
                            Ar
                        </span>

                    </div>

                    @error('provider_price')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

        </div>

    </div>


    {{-- Caractéristiques --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">
                <i class="bi bi-sliders me-2"></i>
                Caractéristiques du produit
            </h5>

        </div>

        <div class="card-body p-4">

            <div class="row g-3">

                {{-- Catégorie --}}
                <div class="col-md-6">

                    <label for="id_category"
                           class="form-label fw-semibold">

                        <i class="bi bi-tags-fill me-1 text-info"></i>
                        Catégorie

                    </label>

                    <select
                        name="id_category"
                        id="id_category"
                        class="form-select">

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('id_category') == $category->id ? 'selected' : '' }}>

                                {{ $category->name_category }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Taille --}}
                <div class="col-md-6">

                    <label for="size"
                           class="form-label fw-semibold">

                        <i class="bi bi-rulers me-1 text-primary"></i>
                        Taille

                    </label>

                    <input
                        type="text"
                        name="size"
                        id="size"
                        class="form-control @error('size') is-invalid @enderror"
                        placeholder="Ex : M, L, XL..."
                        value="{{ old('size') }}">

                    @error('size')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Couleur --}}
                <div class="col-md-6">

                    <label for="color"
                           class="form-label fw-semibold">

                        <i class="bi bi-palette-fill me-1 text-warning"></i>
                        Couleur

                    </label>

                    <input
                        type="text"
                        name="color"
                        id="color"
                        class="form-control @error('color') is-invalid @enderror"
                        placeholder="Ex : Noir"
                        value="{{ old('color') }}">

                    @error('color')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Matière --}}
                <div class="col-md-6">

                    <label for="matter"
                           class="form-label fw-semibold">

                        <i class="bi bi-layers-fill me-1 text-secondary"></i>
                        Matière

                    </label>

                    <input
                        type="text"
                        name="matter"
                        id="matter"
                        class="form-control @error('matter') is-invalid @enderror"
                        placeholder="Ex : Coton"
                        value="{{ old('matter') }}">

                    @error('matter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

        </div>

    </div>


    {{-- Actions --}}
    <div class="d-flex justify-content-end gap-2 mb-5">

        <button
            type="reset"
            class="btn btn-outline-danger">

            <i class="bi bi-arrow-counterclockwise me-1"></i>
            Effacer

        </button>

        <button
            type="submit"
            class="btn btn-success">

            <i class="bi bi-plus-circle-fill me-1"></i>
            Ajouter le produit

        </button>

    </div>

</form>

</div>

@endsection
