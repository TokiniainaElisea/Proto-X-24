<div class="card shadow-sm my-3">

    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            <i class="bi bi-receipt-cutoff me-2"></i>
            Liste des ventes
        </h5>

        <span class="badge bg-primary">
            {{ $sales->total() }} vente(s)
        </span>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th>Client</th>
                        <th>Commande</th>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th width="80">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($sales as $sale)
                        <tr>

                            <td>

                                <span class="badge bg-secondary">
                                    <i class="bi bi-person-badge-fill me-1"></i>
                                    {{ $sale->client->client_number }}
                                </span>

                            </td>

                            <td>

                                <span class="fw-semibold text-primary">
                                    {{ $sale->sale_reference }}
                                </span>

                            </td>

                            <td>

                                <i class="bi bi-person-fill text-secondary me-1"></i>

                                {{ $sale->client->name }}

                            </td>

                            <td>

                                <i class="bi bi-calendar-event me-1 text-muted"></i>

                                {{ $sale->created_at->format('d/m/Y H:i') }}

                            </td>

                            <td>

                                <span class="badge bg-success fs-6">
                                    {{ number_format($sale->total_price, 0, ',', ' ') }} Ar
                                </span>

                            </td>

                            <td>

                                <a href="{{route('show_vente', $sale)}}" class="btn btn-info btn-sm text-white" title="Voir les détails">

                                    <i class="bi bi-eye-fill"></i>

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center text-muted py-4">

                                <i class="bi bi-inbox fs-2 d-block mb-2"></i>

                                Aucune vente trouvée.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $sales->withQueryString()->links() }}
        </div>

    </div>

</div>
