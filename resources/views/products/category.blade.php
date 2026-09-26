<div class="card border-0 shadow-sm my-4">

    <div class="card-header bg-dark text-white d-flex align-items-center">

        <i class="bi bi-funnel-fill me-2"></i>

        <h5 class="mb-0 fw-bold">
            Filtrer les produits
        </h5>

    </div>

    <div class="card-body">

        <form action="{{ route('produits') }}" method="get">

            <div class="row g-3 align-items-end">

                {{-- Catégorie --}}
                <div class="col">

                    <label for="id_category" class="form-label fw-semibold">

                        <i class="bi bi-tags-fill text-info me-1"></i>
                        Catégorie

                    </label>

                    <select name="id_category" id="id_category" class="form-select">

                        <option value="">
                            Toutes les catégories
                        </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('id_category') == $category->id ? 'selected' : '' }}>

                                {{ $category->name_category }}

                            </option>
                        @endforeach

                    </select>

                </div>

                {{-- Nom du produit --}}
                <div class="col">

                    <label for="name_product" class="form-label fw-semibold">

                        <i class="bi bi-box-seam text-primary me-1"></i>
                        Produit

                    </label>

                    <input type="text" name="name_product" id="name_product" class="form-control"
                        value="{{ request('name_product') }}" placeholder="Rechercher un produit...">

                </div>

                {{-- Référence --}}
                <div class="col">
                    <label for="reference" class="form-label fw-semibold">
                        <i class="bi bi-box text-primary me-1"> </i>
                        Référence
                    </label>
                    <input type="text" name="reference" id="reference" class="form-control"
                        value="{{ request('reference') }}" placeholder="Saisissez une référence...">
                </div>

                {{-- Boutons --}}
                <div class="col-lg-2 col-md-2">

                    <div class="d-flex gap-2">

                        <button type="submit" class="btn btn-primary flex-grow-1" title="Rechercher">

                            <i class="bi bi-search me-1"></i>
                            Rechercher

                        </button>

                    </div>

                </div>

            </div>

            {{-- Réinitialisation --}}
            @if (request('id_category') || request('name_product') || request('reference'))
                <div class="mt-3">

                    <a href="{{ route('produits') }}" class="btn btn-sm btn-outline-secondary">

                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                        Réinitialiser les filtres

                    </a>

                </div>
            @endif

        </form>

    </div>

</div>
