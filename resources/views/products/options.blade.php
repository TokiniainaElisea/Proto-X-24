<div class="d-flex justify-content-between align-items-center mb-4 my-2">

    <div>

        <h2 class="fw-bold mb-1">
            <i class="bi bi-box-seam-fill text-primary me-2"></i>
            Gestion des produits
        </h2>

        <small class="text-muted">
            Gérez vos produits, leurs catégories et leur disponibilité en stock.
        </small>

    </div>

    <div class="d-flex gap-2">

        <button
            type="button"
            class="btn btn-outline-info"
            data-bs-toggle="modal"
            data-bs-target="#modal_category">

            <i class="bi bi-tags-fill me-1"></i>
            Gérer les catégories

        </button>

        <a
            href="{{ route('new_product') }}"
            class="btn btn-success">

            <i class="bi bi-plus-circle-fill me-1"></i>
            Nouveau produit

        </a>

    </div>

</div>
@include('products.category.new_category', ['id' => 'modal_category'])
