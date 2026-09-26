@php
    $id;
@endphp

<div
    class="modal fade"
    id="{{ $id }}"
    tabindex="-1"
    aria-labelledby="createExpenseModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            {{-- Header --}}
            <div class="modal-header bg-dark text-white">
                <div>
                    <h5 class="modal-title fw-bold" id="createExpenseModalLabel">
                        <i class="bi bi-wallet2 text-primary me-2"></i>
                        Nouvelle dépense
                    </h5>
                </div>

                <button
                    data-bs-theme = "dark"
                    type="button"
                    class="btn-close text-white"
                    data-bs-dismiss="modal"
                    aria-label="Fermer"
                ></button>
            </div>

            {{-- Formulaire --}}
            <form action="{{ route('new_expense') }}" method="POST">
                @csrf

                <div class="modal-body">

                    {{-- Libellé --}}
                    <div class="mb-3">
                        <label for="expenseLabel" class="form-label fw-semibold">
                            Libellé
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-tag"></i>
                            </span>

                            <input
                                type="text"
                                class="form-control @error('label') is-invalid @enderror"
                                id="expenseLabel"
                                name="label"
                                value="{{ old('label') }}"
                                placeholder="Ex : Électricité"
                                required
                            >
                        </div>

                        @error('label')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    {{-- Montant --}}
                    <div class="mb-3">
                        <label for="expenseAmount" class="form-label fw-semibold">
                            Montant
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-cash-stack"></i>
                            </span>

                            <input
                                type="number"
                                class="form-control @error('amount') is-invalid @enderror"
                                id="expenseAmount"
                                name="amount"
                                value="{{ old('amount') }}"
                                min="0"
                                step="1"
                                placeholder="Ex : 50000"
                                required
                            >

                            <span class="input-group-text">
                                Ar
                            </span>
                        </div>

                        @error('amount')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    {{-- Type --}}
                    <div class="mb-3">
                        <label for="expenseType" class="form-label fw-semibold">
                            Type
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-diagram-3"></i>
                            </span>

                            <select
                                class="form-select @error('type') is-invalid @enderror"
                                id="expenseType"
                                name="type"
                                required
                            >
                                <option value="" disabled
                                    {{ old('type') ? '' : 'selected' }}>
                                    Sélectionner un type
                                </option>

                                <option value="Salaire"
                                    {{ old('type') == 'Salaire' ? 'selected' : '' }}>
                                    Salaire
                                </option>

                                <option value="Transport"
                                    {{ old('type') == 'Transport' ? 'selected' : '' }}>
                                    Transport
                                </option>

                                <option value="Jirama"
                                    {{ old('type') == 'Jirama' ? 'selected' : '' }}>
                                    Jirama
                                </option>

                                <option value="Internet"
                                    {{ old('type') == 'Internet' ? 'selected' : '' }}>
                                    Internet
                                </option>

                                <option value="Loyer"
                                    {{ old('type') == 'Loyer' ? 'selected' : '' }}>
                                    Loyer
                                </option>

                                <option value="IRSA"
                                    {{ old('type') == 'IRSA' ? 'selected' : '' }}>
                                    IRSA
                                </option>

                                <option value="Autre"
                                    {{ old('type') == 'Autre' ? 'selected' : '' }}>
                                    Autre
                                </option>
                            </select>
                        </div>

                        @error('type')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    {{-- Note --}}
                    <div class="mb-0">
                        <label for="expenseNote" class="form-label fw-semibold">
                            Note
                            <span class="text-body-secondary fw-normal">
                                (optionnel)
                            </span>
                        </label>

                        <textarea
                            class="form-control @error('note') is-invalid @enderror"
                            id="expenseNote"
                            name="note"
                            rows="3"
                            placeholder="Ajouter une remarque..."
                        >{{ old('note') }}</textarea>

                        @error('note')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                {{-- Footer --}}
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        <i class="bi bi-x-lg me-1"></i>
                        Annuler
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-check-lg me-1"></i>
                        Enregistrer
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(
                document.getElementById('createExpenseModal')
            );

            modal.show();
        });
    </script>
@endif

