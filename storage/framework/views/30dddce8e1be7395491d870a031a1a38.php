

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
                    <?php if($expenses && $expenses->count() > 0): ?>
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
                                        <a href=""
                                            class="btn btn-success btn-sm me-2">Edit</a>

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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
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