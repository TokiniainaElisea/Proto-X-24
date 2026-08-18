<div class="row">

    <div class="col-12">

        <div class="card border-0 shadow-sm">

            {{-- En-tête --}}
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center">

                    <i class="bi bi-people-fill text-primary fs-5 me-2"></i>

                    <span class="fw-semibold">
                        Liste des clients
                    </span>

                </div>

                <span class="badge bg-primary">
                    {{ $clients->total() }} client(s)
                </span>

            </div>


            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="ps-3">
                                    N° client
                                </th>

                                <th>
                                    Nom
                                </th>

                                <th>
                                    Prénom
                                </th>

                                <th>
                                    Téléphone
                                </th>

                                <th>
                                    Ville
                                </th>

                                <th>
                                    Adresse
                                </th>

                                <th class="text-center">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($clients as $client)
                                <tr>

                                    {{-- Numéro client --}}
                                    <td class="ps-3">

                                        <span class="badge bg-light text-dark border">

                                            <i class="bi bi-person-vcard me-1"></i>

                                            {{ $client->client_number }}

                                        </span>

                                    </td>


                                    {{-- Nom --}}
                                    <td class="fw-semibold">

                                        {{ $client->name }}

                                    </td>


                                    {{-- Prénom --}}
                                    <td>

                                        {{ $client->firstname }}

                                    </td>


                                    {{-- Téléphone --}}
                                    <td>

                                        @if ($client->phone)
                                            <span>

                                                <i class="bi bi-telephone-fill text-success me-1"></i>

                                                {{ '0' . $client->phone }}

                                            </span>
                                        @else
                                            <span class="text-muted">

                                                <i class="bi bi-dash-circle me-1"></i>
                                                Indisponible

                                            </span>
                                        @endif

                                    </td>


                                    {{-- Ville --}}
                                    <td>

                                        @if ($client->town)
                                            <i class="bi bi-geo-alt-fill text-danger me-1"></i>

                                            {{ $client->town }}
                                        @else
                                            <span class="text-muted">
                                                Indisponible
                                            </span>
                                        @endif

                                    </td>


                                    {{-- Adresse --}}
                                    <td>

                                        @if ($client->adress)
                                            <span class="text-truncate d-inline-block" style="max-width: 180px;"
                                                title="{{ $client->adress }}">

                                                {{ $client->adress }}

                                            </span>
                                        @else
                                            <span class="text-muted">
                                                Indisponible
                                            </span>
                                        @endif

                                    </td>


                                    {{-- Actions --}}
                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- Modifier --}}
                                            <button type="button" class="btn btn-sm btn-outline-warning"
                                                data-bs-target="{{ '#client_' . $client->id }}" data-bs-toggle="modal"
                                                title="Modifier">

                                                <i class="bi bi-pencil-square"></i>

                                            </button>


                                            {{-- Supprimer --}}
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-bs-target="{{ '#delete_client' . $client->id }}"
                                                data-bs-toggle="modal" title="Supprimer">

                                                <i class="bi bi-trash3-fill"></i>

                                            </button>


                                            {{-- Modals --}}
                                            @include('clients.parts.update_client', [
                                                'id' => 'client_' . $client->id,
                                                'client' => $client,
                                            ])

                                            @include('clients.parts.delete_client', [
                                                'id' => 'delete_client' . $client->id,
                                                'client' => $client,
                                            ])

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="text-center py-5">

                                        <i class="bi bi-person-x text-muted" style="font-size: 2.5rem;">
                                        </i>

                                        <h6 class="fw-bold mt-3">
                                            Aucun client trouvé
                                        </h6>

                                        <small class="text-muted">
                                            Aucun client n'est actuellement enregistré.
                                        </small>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-3">

            {{ $clients->links() }}

        </div>

    </div>

</div>
