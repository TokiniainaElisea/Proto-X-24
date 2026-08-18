<div class="card border-0 shadow-sm mb-4">

{{-- En-tête --}}
<div class="card-header bg-dark text-white d-flex align-items-center">

    <i class="bi bi-funnel-fill text-primary me-2"></i>

    <span class="fw-semibold">
        Rechercher un client
    </span>

</div>


<div class="card-body">

    <form action="{{ route('client') }}" method="get">

        @csrf

        <div class="row g-3 align-items-end">

            {{-- Nom --}}
            <div class="col-md-3">

                <label
                    for="name"
                    class="form-label fw-semibold">

                    <i class="bi bi-person me-1 text-primary"></i>
                    Nom

                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    placeholder="Nom du client"
                    value="{{ request('name') }}">

            </div>


            {{-- Prénom --}}
            <div class="col-md-3">

                <label
                    for="firstname"
                    class="form-label fw-semibold">

                    <i class="bi bi-person-badge me-1 text-primary"></i>
                    Prénom

                </label>

                <input
                    type="text"
                    id="firstname"
                    name="firstname"
                    class="form-control"
                    placeholder="Prénom du client"
                    value="{{ request('firstname') }}">

            </div>


            {{-- Numéro client --}}
            <div class="col-md-2">

                <label
                    for="client_number"
                    class="form-label fw-semibold">

                    <i class="bi bi-person-vcard me-1 text-primary"></i>
                    N° client

                </label>

                <input
                    type="text"
                    id="client_number"
                    name="client_number"
                    class="form-control"
                    placeholder="N° client"
                    value="{{ request('client_number') }}">

            </div>


            {{-- Téléphone --}}
            <div class="col-md-2">

                <label
                    for="phone"
                    class="form-label fw-semibold">

                    <i class="bi bi-telephone me-1 text-primary"></i>
                    Téléphone

                </label>

                <input
                    type="number"
                    id="phone"
                    name="phone"
                    class="form-control"
                    placeholder="Téléphone"
                    value="{{ request('phone') }}">

            </div>


            {{-- Boutons --}}
            <div class="col-md-2">

                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-primary flex-grow-1"
                        title="Rechercher">

                        <i class="bi bi-search"></i>

                    </button>

                    <a
                        href="{{ route('client') }}"
                        class="btn btn-outline-secondary"
                        title="Réinitialiser">

                        <i class="bi bi-arrow-counterclockwise"></i>

                    </a>

                </div>

            </div>

        </div>

    </form>

</div>

</div>
