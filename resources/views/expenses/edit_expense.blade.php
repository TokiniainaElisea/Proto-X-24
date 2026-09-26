@php
    $id;
    $expense;
@endphp
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="editExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            {{-- Header --}}
            <div class="modal-header">
                <div>
                    <h5 class="modal-title fw-bold" id="editExpenseModalLabel">
                        <i class="bi bi-pencil-square text-warning me-2"></i>
                        Modifier la dépense
                    </h5>

                    <small class="text-body-secondary">
                        Modifier les informations de cette dépense
                    </small>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            {{-- Formulaire --}}
            <form id="editExpenseForm" method="POST" action={{ route('update_expense', $expense) }}>
                @csrf
                @method('PUT')

                <div class="modal-body">

                    {{-- Libellé --}}
                    <div class="mb-3">
                        <label for="editExpenseLabel" class="form-label fw-semibold">
                            Libellé
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-tag"></i>
                            </span>

                            <input type="text" value="{{ $expense->label }}" class="form-control" id="editExpenseLabel" name="label" required>
                        </div>
                    </div>


                    {{-- Montant --}}
                    <div class="mb-3">
                        <label for="editExpenseAmount" class="form-label fw-semibold">
                            Montant
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-cash-stack"></i>
                            </span>

                            <input type="number" class="form-control" id="editExpenseAmount" name="amount"
                                min="0" step="1" required value="{{ $expense->amount }}" >

                            <span class="input-group-text">
                                Ar
                            </span>
                        </div>
                    </div>


                    {{-- Type --}}
                    <div class="mb-3">
                        <label for="editExpenseType" class="form-label fw-semibold">
                            Type
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-diagram-3"></i>
                            </span>

                            <select class="form-select" id="editExpenseType" name="type" required>

                                <option value="{{ $expense->type }} ">
                                    {{ $expense->type }}
                                </option>
                                <option value="" disabled {{ old('type') ? '' : 'selected' }}>
                                    Sélectionner un type
                                </option>

                                <option value="Salaire" {{ old('type') == 'Salaire' ? 'selected' : '' }}>
                                    Salaire
                                </option>

                                <option value="Transport" {{ old('type') == 'Transport' ? 'selected' : '' }}>
                                    Transport
                                </option>

                                <option value="Jirama" {{ old('type') == 'Jirama' ? 'selected' : '' }}>
                                    Jirama
                                </option>

                                <option value="Internet" {{ old('type') == 'Internet' ? 'selected' : '' }}>
                                    Internet
                                </option>

                                <option value="Loyer" {{ old('type') == 'Loyer' ? 'selected' : '' }}>
                                    Loyer
                                </option>

                                <option value="IRSA" {{ old('type') == 'IRSA' ? 'selected' : '' }}>
                                    IRSA
                                </option>

                                <option value="Autre" {{ old('type') == 'Autre' ? 'selected' : '' }}>
                                    Autre
                                </option>
                            </select>
                        </div>
                    </div>


                    {{-- Note --}}
                    <div class="mb-0">
                        <label for="editExpenseNote" class="form-label fw-semibold">
                            Note
                            <span class="text-body-secondary fw-normal">
                                (optionnel)
                            </span>
                        </label>

                        <textarea class="form-control" id="editExpenseNote" name="note" rows="3" placeholder="Ajouter une remarque..." value="{{ $expense->type }}" >
                            {{ $expense->note }}
                        </textarea>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg me-1"></i>
                        Annuler
                    </button>

                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check-lg me-1"></i>
                        Enregistrer les modifications
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

