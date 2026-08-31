<div class="row bg-dark p-2 navbar-dark sidebar">

    <ul class="nav nav-pills flex-column mb-auto gap-1">

        {{-- Principal --}}
        <li class="nav-item">

            <small class="text-uppercase text-secondary fw-bold px-3">
                Principal
            </small>

        </li>

        <li class="nav-item">

            <a href="{{ route('dashboard') }}"
                class="nav-link text-white rounded-3 {{ request()->routeIs('dashboard') ? 'active bg-primary' : '' }}">

                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard

            </a>

        </li>


        {{-- Gestion --}}
        <li class="nav-item mt-3">

            <small class="text-uppercase text-secondary fw-bold px-3">
                Gestion
            </small>

        </li>

        <li class="nav-item">

            <a href="{{ route('ventes') }}"
                class="nav-link text-white rounded-3 {{ request()->routeIs('ventes*') ? 'active bg-primary' : '' }}">

                <i class="bi bi-cart3 me-2"></i>
                Ventes

            </a>

        </li>

        <li class="nav-item">

            <a href="{{ route('produits') }}"
                class="nav-link text-white rounded-3 {{ request()->routeIs('produits*') ? 'active bg-primary' : '' }}">

                <i class="bi bi-box-seam me-2"></i>
                Produits

            </a>

        </li>
        {{-- Finance --}}
        <li class="nav-item mt-3">

            <small class="text-uppercase text-secondary fw-bold px-3">
                Finance
            </small>

        </li>

        <li class="nav-item">

            <a href="{{ route('bilan') }}"
                class="nav-link text-white rounded-3 {{ request()->routeIs('bilan') ? 'active bg-primary' : '' }} ">
                <i class="bi bi-bar-chart-line me-2"></i>
                Bilan

            </a>

        </li>


        {{-- Relations --}}
        <li class="nav-item mt-3">

            <small class="text-uppercase text-secondary fw-bold px-3">
                Relations
            </small>

        </li>

        <li class="nav-item">

            <a href="{{ route('client') }}"
                class="nav-link text-white rounded-3 {{ request()->routeIs('client*') ? 'active bg-primary' : '' }}">

                <i class="bi bi-people-fill me-2"></i>
                Clients

            </a>

        </li>

        <li class="nav-item">

            <a href="{{ route('provider') }}"
                class="nav-link text-white rounded-3 {{ request()->routeIs('provider*') ? 'active bg-primary' : '' }}">

                <i class="bi bi-truck me-2"></i>
                Fournisseurs

            </a>

        </li>
        <li class="nav-item mt-3">

            <small class="text-uppercase text-secondary fw-bold px-3">
                Autre
            </small>

        </li>
        <li class="nav-item">

            <a class="nav-link text-white rounded-3" data-bs-toggle="collapse" href="#settingsMenu" role="button"
                aria-expanded="false" aria-controls="settingsMenu">

                <span>
                    <i class="bi bi-gear me-2"></i>
                    Paramètres
                </span>

            </a>

            <div class="collapse" id="settingsMenu">

                <ul class="navbar-nav mt-1">

                    <li class="nav-item mb-1">

                        <a href="{{ route('company') }}" class="nav-link">

                            <i class="bi bi-building me-1"></i>
                            Société

                        </a>

                    </li>

                    <li class="nav-item mb-1">

                        <a href="{{ route('numbering') }}" class="nav-link">

                            <i class="bi bi-hash me-1"></i>
                            Préfixes

                        </a>

                    </li>
                    <li class="nav-item mb-1">

                        <a href="{{ route('about') }}" class="nav-link">

                            <i class="bi bi-hash me-1"></i>
                            À propos

                        </a>

                    </li>

                </ul>

            </div>

        </li>
    </ul>


</div>

<style>
    .sidebar .nav-link {
        padding: 10px 12px;
        transition: all 0.2s ease;
    }

    .sidebar .nav-link:not(.active):hover {
        background-color: rgba(255, 255, 255, 0.08);
        transform: translateX(3px);
    }

    .sidebar .nav-link i {
        width: 22px;
        display: inline-block;
        text-align: center;
    }

    .sidebar small {
        font-size: 0.68rem;
        letter-spacing: 0.05em;
    }
</style>
