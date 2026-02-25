<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-project-diagram me-2"></i>
        گردش کارها
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('workflows.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            گردش کار جدید
        </a>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <?php if($workflows->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-professional">
                    <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>دپارتمان</th>
                            <th>ایجادکننده</th>
                            <th>وضعیت</th>
                            <th>اولویت</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $workflows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workflow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <strong><?php echo e($workflow->title); ?></strong>
                                <?php if($workflow->description): ?>
                                    <br><small class="text-muted"><?php echo e(Str::limit($workflow->description, 50)); ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-info"><?php echo e($workflow->department->name); ?></span>
                            </td>
                            <td><?php echo e($workflow->creator->name); ?></td>
                            <td>
                                <span class="status-badge status-<?php echo e($workflow->status); ?>">
                                    <?php switch($workflow->status):
                                        case ('active'): ?> فعال <?php break; ?>
                                        <?php case ('inactive'): ?> غیرفعال <?php break; ?>
                                        <?php case ('archived'): ?> آرشیو شده <?php break; ?>
                                    <?php endswitch; ?>
                                </span>
                            </td>
                            <td>
                                <span class="priority-badge priority-<?php echo e($workflow->priority); ?>">
                                    <?php switch($workflow->priority):
                                        case (1): ?> پایین <?php break; ?>
                                        <?php case (2): ?> متوسط <?php break; ?>
                                        <?php case (3): ?> بالا <?php break; ?>
                                        <?php case (4): ?> بحرانی <?php break; ?>
                                    <?php endswitch; ?>
                                </span>
                            </td>
                            <td>
                                <?php if($workflow->start_date): ?>
                                    <?php echo e($workflow->start_date->format('Y/m/d')); ?>

                                <?php else: ?>
                                    <span class="text-muted">تعیین نشده</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($workflow->due_date): ?>
                                    <?php echo e($workflow->due_date->format('Y/m/d')); ?>

                                <?php else: ?>
                                    <span class="text-muted">تعیین نشده</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?php echo e(route('workflows.show', $workflow)); ?>" class="btn btn-info" title="مشاهده">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('workflows.edit', $workflow)); ?>" class="btn btn-warning" title="ویرایش">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('workflows.destroy', $workflow)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger" title="حذف" onclick="return confirm('آیا مطمئن هستید؟')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <?php echo e($workflows->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-4">
                <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">هیچ گردش کاری یافت نشد</h5>
                <p class="text-muted">برای شروع، اولین گردش کار را ایجاد کنید.</p>
                <a href="<?php echo e(route('workflows.create')); ?>" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    ایجاد گردش کار
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/workflow/workflow-system/resources/views/workflows/index.blade.php ENDPATH**/ ?>