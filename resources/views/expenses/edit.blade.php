<div class="modal fade" id="editExpenses{{ $expense->id }}" tabindex="-1" aria-labelledby="editExpensesLabel{{ $expense->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editExpenses">Edit Your Expenses</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('expense.update', $expense->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="date" class="form-label">Date </label>
                        <input type="date" class="form-control" name="date" value="{{ $expense->date }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $expense->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Amount</label>
                        <input type="text" class="form-control" name="amount" value="{{ $expense->amount }}">
                    </div>
                    <button type="submit" class="btn btn-success w-100 fs-6">Edit Expenses</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</div>