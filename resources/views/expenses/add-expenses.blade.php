<div class="modal fade" id="addExpenses" aria-hidden="true" aria-labelledby="addExpenses" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addExpenses">Add Your Expenses</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('addExpenses')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="date" class="form-label">Date </label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                        @error('date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" id="category" value="{{ old('category') }}">
                        @error('category')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Amount</label>
                        <input type="text" class="form-control" name="amount" id="" value="{{ old('amount') }}">
                        @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- <div class="mb-3">
                        <label for="" class="form-label">Payment Method</label>
                        <input type="text" class="form-control" name="payment" id="">
                    </div> -->
                    <div class="mb-3">
                        <label for="payment" class="form-label">Payment Method</label>
                        <select name="payment" id="payment" class="form-select" required>
                            <option value="Cash" {{ (isset($expense) && $expense->payment == 'Cash') ? 'selected' : '' }}>Cash</option>
                            <option value="Online" {{ (isset($expense) && $expense->payment == 'Online') ? 'selected' : '' }}>Online</option>
                            <option value="Other" {{ (isset($expense) && $expense->payment == 'Other') ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Notes</label>
                        <input type="text" class="form-control" name="notes" id="">
                    </div>

                    <button type="submit" class="btn btn-success w-100 fs-6">Add Expenses</button>
                </form>

                @if(session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>
                @endif
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</div>