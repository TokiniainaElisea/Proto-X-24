{{-- État du stock actuel --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-dark text-white py-3 d-flex justify-content-between">
        <h5 class="mb-0">
            <i class="bi bi-box-seam me-2"></i>
            Valeur du stock actuel
        </h5>
        <small class="text-white-50">
            Évaluation des marchandises actuellement disponibles
        </small>
    </div>

    <div class="card-body">
        <div class="row g-3">

            {{-- Quantité en stock --}}
            <div class="col">
                <div class="card border h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2">
                                    Quantité disponible
                                </p>
                                <h4 class="fw-bold mb-0">
                                    {{ number_format($stockQuantity, 0, ',', ' ') }}
                                </h4>
                                <small class="text-muted">
                                    Unités en stock
                                </small>
                            </div>
                            <i class="bi bi-boxes fs-3 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Valeur au prix d'achat --}}
            <div class="col">
                <div class="card border h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2">
                                    Coût du stock
                                </p>
                                <h4 class="fw-bold mb-0">
                                    {{ number_format($stockCostValue, 0, ',', ' ') }}
                                </h4>
                                <small class="text-muted">Ariary</small>
                            </div>
                            <i class="bi bi-wallet2 fs-3 text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Valeur au prix de vente --}}
            <div class="col">
                <div class="card border h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2">
                                    Valeur commerciale
                                </p>
                                <h4 class="fw-bold mb-0">
                                    {{ number_format($stockSellingValue, 0, ',', ' ') }}
                                </h4>
                                <small class="text-muted">Ariary</small>
                            </div>
                            <i class="bi bi-shop fs-3 text-info"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="alert alert-info mt-3 mb-0 d-flex align-items-start">
            <i class="bi bi-info-circle-fill me-2 mt-1"></i>
            <div class="small">
                <strong>À savoir :</strong>
                le coût du stock représente la valeur d'achat des marchandises
                restantes. La valeur commerciale correspond au montant
                théorique obtenu si elles étaient toutes vendues aux prix
                actuels.
            </div>
        </div>
    </div>
</div>
