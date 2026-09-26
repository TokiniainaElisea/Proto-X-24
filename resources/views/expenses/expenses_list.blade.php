<div class="card border-0 shadow-sm">
    <div class="card-header border-0 bg-dark text-light">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class=" mb-1">
                    <i class="bi bi-wallet2 text-primary me-2"></i>
                    Liste des dépenses
                </h5>
            </div>

            <span class="badge text-bg-primary rounded-pill">
                {{ $expenses->count() }} dépense(s)
            </span>
        </div>
    </div>

    <div class="card-body p-0">
        @if ($expenses->isEmpty())

            <div class="text-center py-5">
                <i class="bi bi-wallet2 fs-1 text-body-secondary"></i>

                <h6 class="fw-bold mt-3 mb-1">
                    Aucune dépense
                </h6>

                <p class="text-body-secondary mb-0">
                    Aucune dépense n'a encore été enregistrée.
                </p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Dépense</th>
                            <th>Type</th>
                            <th>Montant</th>
                            <th>Note</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($expenses as $expense)
                            <tr>
                                {{-- Libellé --}}
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary-subtle text-primary rounded p-2 me-3">
                                            <i class="bi bi-receipt"></i>
                                        </div>

                                        <div>
                                            <div class="fw-semibold">
                                                {{ $expense->label }}
                                            </div>

                                            <small class="text-body-secondary">
                                                #{{ $expense->id }}
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                {{-- Type --}}
                                <td>
                                    @if ($expense->type)
                                        <span class="badge text-bg-secondary">
                                            {{ $expense->type }}
                                        </span>
                                    @else
                                        <span class="text-body-secondary">
                                            —
                                        </span>
                                    @endif
                                </td>

                                {{-- Montant --}}
                                <td>
                                    <span class="fw-bold text-danger">
                                        - {{ number_format($expense->amount, 0, ',', ' ') }} Ar
                                    </span>
                                </td>

                                {{-- Note --}}
                                <td>
                                    @if ($expense->note)
                                        <span class="text-body-secondary d-inline-block text-truncate"
                                            style="max-width: 250px;" title="{{ $expense->note }}">
                                            {{ $expense->note }}
                                        </span>
                                    @else
                                        <span class="text-body-secondary">
                                            —
                                        </span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="text-end pe-4">
                                    <div class="btn-group" role="group">

                                        {{-- Voir --}}
                                        <button type="button" class="btn btn-sm btn-outline-warning" title="Modifier"
                                            data-bs-toggle="modal" data-bs-target="{{ '#editExpenseModal'.$expense->id }}" >
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        {{-- Supprimer --}}
                                        <form action="{{ route('expense_destroy', $expense) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Voulez-vous vraiment supprimer cette dépense ?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                title="Supprimer">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                                @include('expenses.edit_expense', [
                                            'id' => 'editExpenseModal'.$expense->id,
                                            'expense' => $expense
                                        ])
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $expenses->links() }}
            </div>

        @endif
    </div>
</div>
