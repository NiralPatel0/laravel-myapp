<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body text-center">
                    <h3 class="fs-5 m-0 fw-bolder mb-4">Welcome To My App</h3>

                    <div class="d-flex gap-2 justify-content-center">
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-success">Login</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-success">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\digifloat\my-app\resources\views/welcome.blade.php ENDPATH**/ ?>