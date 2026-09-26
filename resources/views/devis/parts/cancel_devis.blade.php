@php
    $id;
@endphp
<div
    class="modal fade"
    id="{{ $id }}"
    tabindex="-1"
    aria-labelledby="confirmCancelQuoteModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow">

            {{-- Header --}}
            <div class="modal-header bg-dark text-white">

                <h5 class="modal-title" id="confirmCancelQuoteModalLabel">

                    <i class="bi bi-x-circle-fill text-danger me-2"></i>

                    Annuler le devis

                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Fermer"
                ></button>

            </div>


            {{-- Body --}}
            <div class="modal-body p-4">

                <div class="text-center mb-3">

                    <div
                        class="rounded-circle bg-danger bg-opacity-10
                               d-inline-flex align-items-center
                               justify-content-center"
                        style="width: 70px; height: 70px;"
                    >

                        <i class="bi bi-file-earmark-x-fill text-danger fs-1"></i>

                    </div>

                </div>


                <h5 class="text-center fw-bold mb-2">

                    Voulez-vous vraiment annuler ce devis ?

                </h5>


                <p class="text-center text-muted mb-4">

                    Cette action annulera le devis et celui-ci ne pourra
                    plus être validé comme une vente.

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

                        <strong>

                            {{ number_format($quote->total_price, 0, ',', ' ') }}
                            Ar

                        </strong>

                    </div>

                </div>


                {{-- Avertissement --}}
                <div class="alert alert-danger d-flex align-items-start mb-0">

                    <i class="bi bi-exclamation-triangle-fill me-2 mt-1"></i>

                    <div class="small">

                        <strong>Attention :</strong>

                        vérifiez que vous souhaitez réellement annuler ce devis
                        avant de confirmer.

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-outline-secondary"
                    data-bs-dismiss="modal"
                >

                    <i class="bi bi-arrow-left me-1"></i>

                    Conserver le devis

                </button>


                <form
                    action="{{ route('cancel_devis', $quote) }}"
                    method="POST"
                    class="d-inline"
                >

                    @csrf
                    @method('put')

                    <button
                        type="submit"
                        class="btn btn-danger"
                    >

                        <i class="bi bi-x-circle-fill me-1"></i>

                        Confirmer l'annulation

                    </button>

                </form>

            </div>

        </div>

    </div>
</div>