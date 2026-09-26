{{-- Filtres --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            <i class="bi bi-funnel-fill me-2"></i>
            Filtrer les dépenses
        </h5>

        <span class="badge bg-secondary">
            Recherche
        </span>

    </div>


    <div class="card-body">

        <form action="{{ route('expenses') }}" method="GET">

            <div class="row g-3">

                {{-- Libellé --}}
                <div class="col-md-6">

                    <label for="label" class="form-label fw-semibold">
                        <i class="bi bi-search me-1 text-primary"></i>
                        Libellé
                    </label>

                    <input
                        type="text"
                        name="label"
                        id="label"
                        class="form-control"
                        value="{{ request('label') }}"
                        placeholder="Ex : Achat de fournitures"
                    >

                </div>


                {{-- Type --}}
                 {{-- Date début --}}
                <div class="col-md-2">

                    <label for="begin" class="form-label fw-semibold">
                        <i class="bi bi-calendar-event me-1 text-success"></i>
                        Du
                    </label>

                    <input
                        type="date"
                        name="begin"
                        id="begin"
                        class="form-control"
                        value="{{ request('begin') }}"
                    >

                </div>


                {{-- Date fin --}}
                <div class="col-md-2">

                    <label for="ending" class="form-label fw-semibold">
                        <i class="bi bi-calendar-check me-1 text-danger"></i>
                        Au
                    </label>

                    <input
                        type="date"
                        name="ending"
                        id="ending"
                        class="form-control"
                        value="{{ request('ending') }}"
                    >

                </div>


                {{-- Bouton --}}
                <div class="col-md-1 d-flex align-items-end">

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                        title="Filtrer"
                    >

                        <i class="bi bi-search"></i>

                    </button>

                </div>

            </div>


            {{-- Réinitialiser --}}
            @if(request()->hasAny(['label', 'type', 'begin', 'ending']))

                <div class="mt-3">

                    <a
                        href="{{ route('expenses') }}"
                        class="btn btn-sm btn-outline-secondary"
                    >

                        <i class="bi bi-arrow-counterclockwise me-1"></i>

                        Réinitialiser les filtres

                    </a>

                </div>

            @endif

        </form>

    </div>

</div>