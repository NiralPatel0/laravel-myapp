<div class="modal fade" id="addExpenses" aria-hidden="true" aria-labelledby="addExpenses" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addExpenses">Add Your Expenses</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('addExpenses')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date </label>
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo e(old('date')); ?>">
                        <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo e(old('title')); ?>">
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" id="category" value="<?php echo e(old('category')); ?>">
                        <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Amount</label>
                        <input type="text" class="form-control" name="amount" id="" value="<?php echo e(old('amount')); ?>">
                        <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="" class="form-label">Payment Method</label>
                        <input type="text" class="form-control" name="payment" id="">
                    </div> -->
                    <div class="mb-3">
                        <label for="payment" class="form-label">Payment Method</label>
                        <select name="payment" id="payment" class="form-select" required>
                            <option value="Cash" <?php echo e((isset($expense) && $expense->payment == 'Cash') ? 'selected' : ''); ?>>Cash</option>
                            <option value="Online" <?php echo e((isset($expense) && $expense->payment == 'Online') ? 'selected' : ''); ?>>Online</option>
                            <option value="Other" <?php echo e((isset($expense) && $expense->payment == 'Other') ? 'selected' : ''); ?>>Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Notes</label>
                        <input type="text" class="form-control" name="notes" id="">
                    </div>

                    <button type="submit" class="btn btn-success w-100 fs-6">Add Expenses</button>
                </form>

                <?php if(session('success')): ?>
                <script>
                    alert("<?php echo e(session('success')); ?>");
                </script>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</div><?php /**PATH E:\digifloat\my-app\resources\views/expenses/add-expenses.blade.php ENDPATH**/ ?>