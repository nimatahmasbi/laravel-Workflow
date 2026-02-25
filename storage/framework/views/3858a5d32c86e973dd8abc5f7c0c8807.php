<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-building me-2"></i>
        جزئیات دپارتمان
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('departments.edit', $department)); ?>" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i>
            ویرایش
        </a>
        <a href="<?php echo e(route('departments.index')); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-right me-2"></i>
            بازگشت
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="dashboard-card">
            <div class="card-header-professional">
                <h6>
                    <i class="fas fa-info-circle me-2"></i>
                    اطلاعات دپارتمان
                </h6>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-building fa-2x text-primary me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">نام دپارتمان</h6>
                                <h5 class="mb-0"><?php echo e($department->name); ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-tie fa-2x text-success me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">مدیر</h6>
                                <h5 class="mb-0"><?php echo e($department->manager_name ?: 'تعیین نشده'); ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-toggle-on fa-2x <?php echo e($department->is_active ? 'text-success' : 'text-danger'); ?> me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">وضعیت</h6>
                                <h5 class="mb-0">
                                    <?php if($department->is_active): ?>
                                        <span class="badge bg-success">فعال</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">غیرفعال</span>
                                    <?php endif; ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if($department->description): ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="text-muted mb-2">
                            <i class="fas fa-align-left me-2"></i>
                            توضیحات
                        </h6>
                        <p class="mb-0 p-3 bg-light rounded text-overflow-safe"><?php echo e($department->description); ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <?php if($department->phone): ?>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <span class="text-muted">شماره تماس:</span>
                            <span class="ms-2 fw-bold text-overflow-safe"><?php echo e($department->phone); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 mb-3">
                        <?php if($department->email): ?>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <span class="text-muted">ایمیل:</span>
                            <span class="ms-2 fw-bold"><?php echo e($department->email); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="<?php echo e(route('departments.edit', $department)); ?>" class="btn btn-warning">
                                <i class="fas fa-edit me-2"></i>
                                ویرایش دپارتمان
                            </a>
                            <form action="<?php echo e(route('departments.destroy', $department)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این دپارتمان را حذف کنید؟')">
                                    <i class="fas fa-trash me-2"></i>
                                    حذف دپارتمان
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/workflow/workflow-system/resources/views/departments/show.blade.php ENDPATH**/ ?>