<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <i class="fas fa-sign-in-alt me-2"></i>
        <?php echo e(__('ورود به سیستم')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <div class="row mb-3">
                <label for="email" class="col-md-3 col-form-label text-md-end">
                    <?php echo e(__('آدرس ایمیل')); ?>

                </label>

                <div class="col-md-7">
                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label text-md-end">
                    <?php echo e(__('رمز عبور')); ?>

                </label>

                <div class="col-md-7">
                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-7 offset-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="remember">
                            <?php echo e(__('مرا به خاطر بسپار')); ?>

                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-7 offset-md-3">
                    <button type="submit" class="btn btn-primary me-3">
                        <?php echo e(__('ورود')); ?>

                    </button>

                    <?php if(Route::has('password.request')): ?>
                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('رمز عبور خود را فراموش کرده‌اید؟')); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 offset-md-3">
                    <hr class="my-3">
                    <p class="text-muted mb-0">
                        <?php echo e(__('حساب کاربری ندارید؟')); ?>

                        <a href="<?php echo e(route('register')); ?>" class="text-decoration-none fw-bold">
                            <?php echo e(__('ثبت‌نام کنید')); ?>

                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/workflow/workflow-system/resources/views/auth/login.blade.php ENDPATH**/ ?>