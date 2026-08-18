<div class="row">

    <div class="col-12">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

                <h5 class="mb-0">
                    <i class="bi bi-truck me-2"></i>
                    Liste des fournisseurs
                </h5>

                <span class="badge bg-primary">
                    {{ $providers->count() }} fournisseur(s)
                </span>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>
                                    <i class="bi bi-building me-1"></i>
                                    Fournisseur
                                </th>

                                <th>
                                    <i class="bi bi-envelope me-1"></i>
                                    E-mail
                                </th>

                                <th>
                                    <i class="bi bi-telephone me-1"></i>
                                    Téléphone
                                </th>

                                <th width="140">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($providers as $provider)
                                <tr>

                                    {{-- Fournisseur --}}
                                    <td>

                                        <div class="d-flex align-items-center">

                                            <div class="
                                                        text-primary rounded-circle
                                                        d-flex align-items-center
                                                        justify-content-center me-3"
                                                style="width:42px;height:42px;">

                                                <i class="bi bi-building fs-5"></i>

                                            </div>

                                            <div>

                                                <div class="fw-semibold">
                                                    {{ $provider->name_provider }}
                                                </div>

                                                <small class="text-muted">
                                                    Fournisseur #{{ $provider->id }}
                                                </small>

                                            </div>

                                        </div>

                                    </td>

                                    {{-- Email --}}
                                    <td>

                                        @if ($provider->mail)
                                            <a href="mailto:{{ $provider->mail }}" class="text-decoration-none">

                                                <i
                                                    class="bi bi-envelope-fill
                                                          text-primary me-1"></i>

                                                {{ $provider->mail }}

                                            </a>
                                        @else
                                            <span class="text-muted">
                                                Non renseigné
                                            </span>
                                        @endif

                                    </td>

                                    {{-- Téléphone --}}
                                    <td>

                                        @if ($provider->phone)
                                            <span>

                                                <i
                                                    class="bi bi-telephone-fill
                                                          text-success me-1"></i>

                                                {{ '0' . $provider->phone }}

                                            </span>
                                        @else
                                            <span class="text-muted">
                                                Non renseigné
                                            </span>
                                        @endif

                                    </td>

                                    {{-- Actions --}}
                                    <td>

                                        <div class="btn-group">

                                            <button type="button" class="btn btn-warning btn-sm" title="Modifier"
                                                data-bs-target="{{ '#provider_' . $provider->id }}"
                                                data-bs-toggle="modal">

                                                <i class="bi bi-pencil-square"></i>

                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" title="Supprimer"
                                                data-bs-target="{{ '#delete_provider' . $provider->id }}"
                                                data-bs-toggle="modal">

                                                <i class="bi bi-trash3-fill"></i>

                                            </button>

                                        </div>

                                        @include('fournisseurs.parts.edit', [
                                            'provider' => $provider,
                                            'id' => $provider->id,
                                            'name_provider' => $provider->name_provider,
                                            'mail' => $provider->mail,
                                            'phone' => $provider->phone,
                                        ])

                                        @include('fournisseurs.parts.delete', [
                                            'id' => $provider->id,
                                            'provider' => $provider,
                                        ])

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center text-muted py-5">

                                        <i class="bi bi-truck fs-1 d-block mb-2"></i>

                                        Aucun fournisseur enregistré.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>
