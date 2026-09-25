@php
    $id;
@endphp

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="confirmValidateQuoteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow">

            {{-- Header --}}
            <div class="modal-header bg-dark text-white">

                <h5 class="modal-title" id="confirmValidateQuoteModalLabel">

                    <i class="bi bi-check-circle-fill text-success me-2"></i>

                    Valider le devis

                </h5>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Fermer"></button>

            </div>


            {{-- Body --}}
            <div class="modal-body p-4">

                <div class="text-center mb-3">

                    <div class="rounded-circle bg-success bg-opacity-10
                               d-inline-flex align-items-center
                               justify-content-center"
                        style="width: 70px; height: 70px;">

                        <i class="bi bi-file-earmark-check-fill text-success fs-1"></i>

                    </div>

                </div>


                <h5 class="text-center fw-bold mb-2">

                    Confirmer la validation ?

                </h5>


                <p class="text-center text-muted mb-4">

                    Vous êtes sur le point de valider ce devis.

                    Cette action permettra de le transformer en vente.

                </p>


                {{-- Informations du devis --}}
                <div class="bg-light rounded p-3 mb-3">

                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">
                            Devis
                        </span>

                        <strong>
                            {{ $quote->quote_reference }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">
                            Client
                        </span>

                        <strong>
                            {{ $quote->client->name ?? 'Client non défini' }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between">

                        <span class="text-muted">
                            Montant
                        </span>

                        <strong class="text-success">

                            {{ number_format($quote->total_price, 0, ',', ' ') }}
                            Ar

                        </strong>

                    </div>

                </div>


                <div class="alert alert-warning d-flex align-items-start mb-0">

                    <i class="bi bi-exclamation-triangle-fill me-2 mt-1"></i>

                    <div class="small">

                        <strong>Attention :</strong>

                        vérifiez les produits, les quantités et le montant
                        avant de confirmer la validation.

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="modal-footer">

                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">

                    <i class="bi bi-x-lg me-1"></i>

                    Annuler

                </button>


                <form action="{{ route('validate_devis', $quote) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">

                        <i class="bi bi-check-lg me-1"></i>

                        Confirmer la validation

                    </button>
                </form>

            </div>

        </div>

    </div>
</div>
