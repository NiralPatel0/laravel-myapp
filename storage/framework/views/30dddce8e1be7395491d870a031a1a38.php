<?php $__env->startSection('title', 'My Expenses'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-6  mb-3 mb-sm-0">
            <h3 class="card-title fw-bolder mb-2">Welcome <span class="text-success"><?php echo e(ucfirst(Auth::user()->name)); ?></span></h3>
            <p class="card-text">Add a new expenses </p>
        </div>
        <div class="col-sm-6 text-end">
            <span class="btn btn-success" data-bs-target="#addExpenses" data-bs-toggle="modal">Add Expenses</span>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mt-4 shadow">
                <div class="card-body px-0">
                    <div class="p-2">
                        <form action="<?php echo e(route('expenses.index')); ?>" method="GET" class="mb-3 d-flex align-items-center gap-2">
                            <div class="row w-100 align-items-end">
                                <div class="col-lg-3">
                                    <label for="">From:</label>
                                    <input type="date" name="from_date" id="from_date" class="form-control"
                                        value="<?php echo e(request('from_date')); ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="to_date">To:</label>
                                    <input type="date" name="to_date" id="to_date" class="form-control"
                                        value="<?php echo e(request('to_date')); ?>">
                                </div>

                                <div class="col-lg-3">
                                    <label for="">Payment Method:</label>
                                    <select name="payment" class="form-control">
                                        <option value="">-- Select Payment Method --</option>
                                        <option value="Cash" <?php echo e(request('payment') == 'Cash' ? 'selected' : ''); ?>>Cash</option>
                                        <option value="Online" <?php echo e(request('payment') == 'Online' ? 'selected' : ''); ?>>Online</option>
                                        <option value="Other" <?php echo e(request('payment') == 'Other' ? 'selected' : ''); ?>>Other</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 d-flex gap-2">
                                    <button type="submit" class="btn btn-success">Filter Date</button>
                                    <a href="<?php echo e(route('expenses.index')); ?>" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if($expenses && $expenses->count() > 0): ?>

                    <hr>

                    <div class="table-responsive">
                        <table class="table tab  mb-0">
                            <thead>
                                <tr>
                                    <td>Sr_No.</td>
                                    <td>Date</td>
                                    <td>Title</td>
                                    <td>Category</td>
                                    <td>Amount</td>
                                    <td>Payment_Method</td>
                                    <td>Notes</td>
                                    <td>
                                        Actions
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($expense->date); ?></td>
                                    <td><?php echo e($expense->title); ?></td>
                                    <td><?php echo e($expense->category); ?></td>
                                    <td><?php echo e($expense->amount); ?></td>
                                    <td><?php echo e($expense->payment); ?></td>
                                    <td><?php echo e($expense->notes); ?></td>
                                    <td class="flex-nowrap d-flex">
                                        <!--  -->
                                        <!-- <a href=""
                                            class="btn btn-success btn-sm me-2">Edit</a> -->

                                        <button type="button" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editExpenses<?php echo e($expense->id); ?>">
                                            Edit
                                        </button>

                                        <!--  -->
                                        <form action="<?php echo e(route('expenses.destroy', $expense->id)); ?>"
                                            method="POST"
                                            style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this expense?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php echo $__env->make('expenses.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                        <div class="p-2 text-center fw-bolder">
                            Total Of Expenses :
                            <span class="text-success fs-5"><?php echo e($totalAmount); ?></span>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="p-2 text-center">
                        <p class="mb-0">Data Not Found</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('expenses.add-expenses', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\digifloat\my-app\resources\views/expenses/index.blade.php ENDPATH**/ ?>