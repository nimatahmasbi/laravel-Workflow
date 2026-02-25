<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-project-diagram me-2"></i>
        جزئیات گردش کار
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('workflows.edit', $workflow)); ?>" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i>
            ویرایش
        </a>
        <a href="<?php echo e(route('workflows.index')); ?>" class="btn btn-secondary">
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
                    اطلاعات گردش کار
                </h6>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-project-diagram fa-2x text-primary me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">عنوان</h6>
                                <h5 class="mb-0 text-overflow-safe"><?php echo e($workflow->title); ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-building fa-2x text-success me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">دپارتمان</h6>
                                <h5 class="mb-0"><?php echo e($workflow->department->name); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user fa-2x text-info me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">ایجادکننده</h6>
                                <h5 class="mb-0"><?php echo e($workflow->creator->name); ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-toggle-on fa-2x <?php echo e($workflow->status == 'active' ? 'text-success' : 'text-danger'); ?> me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">وضعیت</h6>
                                <h5 class="mb-0">
                                    <?php switch($workflow->status):
                                        case ('active'): ?> <span class="badge bg-success">فعال</span> <?php break; ?>
                                        <?php case ('inactive'): ?> <span class="badge bg-danger">غیرفعال</span> <?php break; ?>
                                        <?php case ('archived'): ?> <span class="badge bg-secondary">آرشیو شده</span> <?php break; ?>
                                    <?php endswitch; ?>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-triangle fa-2x text-warning me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">اولویت</h6>
                                <h5 class="mb-0">
                                    <?php switch($workflow->priority):
                                        case (1): ?> <span class="badge bg-success">پایین</span> <?php break; ?>
                                        <?php case (2): ?> <span class="badge bg-warning">متوسط</span> <?php break; ?>
                                        <?php case (3): ?> <span class="badge bg-danger">بالا</span> <?php break; ?>
                                        <?php case (4): ?> <span class="badge bg-dark">بحرانی</span> <?php break; ?>
                                    <?php endswitch; ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if($workflow->description): ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="text-muted mb-2">
                            <i class="fas fa-align-left me-2"></i>
                            توضیحات
                        </h6>
                        <p class="mb-0 p-3 bg-light rounded text-overflow-safe"><?php echo e($workflow->description); ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <?php if($workflow->start_date): ?>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-calendar-plus text-primary me-2"></i>
                            <span class="text-muted">تاریخ شروع:</span>
                            <span class="ms-2 fw-bold"><?php echo e($workflow->start_date->format('Y/m/d')); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 mb-3">
                        <?php if($workflow->due_date): ?>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-calendar-check text-primary me-2"></i>
                            <span class="text-muted">تاریخ پایان:</span>
                            <span class="ms-2 fw-bold"><?php echo e($workflow->due_date->format('Y/m/d')); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="<?php echo e(route('workflows.edit', $workflow)); ?>" class="btn btn-warning">
                                <i class="fas fa-edit me-2"></i>
                                ویرایش گردش کار
                            </a>
                            <form action="<?php echo e(route('workflows.destroy', $workflow)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این گردش کار را حذف کنید؟')">
                                    <i class="fas fa-trash me-2"></i>
                                    حذف گردش کار
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/workflow/workflow-system/resources/views/workflows/show.blade.php ENDPATH**/ ?>