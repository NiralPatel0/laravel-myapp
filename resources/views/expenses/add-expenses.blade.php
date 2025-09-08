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
                        <input type="date" class="form-control" id="date" name="date">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" id="category">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Amount</label>
                        <input type="text" class="form-control" name="amount" id="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Payment Method</label>
                        <input type="text" class="form-control" name="payment" id="">
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