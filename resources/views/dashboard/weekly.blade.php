<div class="card shadow-sm border-0">

    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            <i class="bi bi-clock-history me-2"></i>
            Dernières ventes
        </h5>

        <span class="badge bg-primary">
            {{ $sales->total() }} vente(s)
        </span>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Commande</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th width="70">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($sales as $sale)
                        <tr>

                            <td>

                                <span class="fw-semibold text-primary">
                                    <i class="bi bi-receipt me-1"></i>
                                    {{ $sale->sale_reference }}
                                </span>

                            </td>

                            <td>

                                <i class="bi bi-person-circle text-secondary me-1"></i>

                                {{ $sale->client->name }}
                                {{ $sale->client->firstname }}

                            </td>

                            <td>

                                <i class="bi bi-calendar-event text-muted me-1"></i>

                                {{ $sale->created_at->format('d/m/Y H:i') }}

                            </td>

                            <td>

                                <span class="badge bg-success fs-6">

                                    {{ number_format($sale->total_price, 0, ',', ' ') }} Ar

                                </span>

                            </td>

                            <td>

                                <a href="{{ route('show_vente', $sale) }}" class="btn btn-info btn-sm text-white"
                                    title="Voir la vente">

                                    <i class="bi bi-eye-fill"></i>

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-5 text-muted">

                                <i class="bi bi-cart-x fs-1 d-block mb-2"></i>

                                Aucune vente enregistrée.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $sales->links() }}
        </div>

    </div>

</div>
