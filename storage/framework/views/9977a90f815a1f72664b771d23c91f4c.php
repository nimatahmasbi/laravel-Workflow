<?php $__env->startSection('content'); ?>
<div class="dashboard-title">
    <i class="fas fa-tachometer-alt"></i>
    داشبورد
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="dashboard-card card-departments">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col me-2">
                        <div class="dashboard-stat-label">
                            دپارتمان‌ها
                        </div>
                        <div class="dashboard-stat-value"><?php echo e($stats['total_departments']); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building dashboard-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="dashboard-card card-workflows">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col me-2">
                        <div class="dashboard-stat-label">
                            گردش کارها
                        </div>
                        <div class="dashboard-stat-value"><?php echo e($stats['total_workflows']); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-project-diagram dashboard-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="dashboard-card card-tasks">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col me-2">
                        <div class="dashboard-stat-label">
                            کل تسک‌ها
                        </div>
                        <div class="dashboard-stat-value"><?php echo e($stats['total_tasks']); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tasks dashboard-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="dashboard-card card-pending">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col me-2">
                        <div class="dashboard-stat-label">
                            تسک‌های در انتظار
                        </div>
                        <div class="dashboard-stat-value"><?php echo e($stats['pending_tasks']); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock dashboard-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="dashboard-card mb-4">
            <div class="card-header-professional d-flex flex-row align-items-center justify-content-between">
                <h6>
                    <i class="fas fa-project-diagram me-2"></i>
                    آخرین گردش کارها
                </h6>
                <a href="<?php echo e(route('workflows.index')); ?>" class="btn-professional">
                    مشاهده همه
                </a>
            </div>
            <div class="card-body">
                <?php if($recent_workflows->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-professional" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>عنوان</th>
                                    <th>دپارتمان</th>
                                    <th>وضعیت</th>
                                    <th>اولویت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $recent_workflows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workflow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(route('workflows.show', $workflow)); ?>" class="link-professional">
                                            <?php echo e($workflow->title); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($workflow->department->name); ?></td>
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
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-muted text-center">هیچ گردش کاری یافت نشد.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <div class="dashboard-card mb-4">
            <div class="card-header-professional d-flex flex-row align-items-center justify-content-between">
                <h6>
                    <i class="fas fa-tasks me-2"></i>
                    آخرین تسک‌ها
                </h6>
                <a href="<?php echo e(route('tasks.index')); ?>" class="btn-professional">
                    مشاهده همه
                </a>
            </div>
            <div class="card-body">
                <?php if($recent_tasks->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-professional" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>عنوان</th>
                                    <th>گردش کار</th>
                                    <th>وضعیت</th>
                                    <th>اولویت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $recent_tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(route('tasks.show', $task)); ?>" class="link-professional">
                                            <?php echo e($task->title); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($task->workflow->title); ?></td>
                                    <td>
                                        <span class="status-badge status-<?php echo e($task->status); ?>">
                                            <?php switch($task->status):
                                                case ('pending'): ?> در انتظار <?php break; ?>
                                                <?php case ('in_progress'): ?> در حال انجام <?php break; ?>
                                                <?php case ('completed'): ?> تکمیل شده <?php break; ?>
                                                <?php case ('rejected'): ?> رد شده <?php break; ?>
                                                <?php case ('on_hold'): ?> متوقف شده <?php break; ?>
                                            <?php endswitch; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="priority-badge priority-<?php echo e($task->priority); ?>">
                                            <?php switch($task->priority):
                                                case ('low'): ?> پایین <?php break; ?>
                                                <?php case ('medium'): ?> متوسط <?php break; ?>
                                                <?php case ('high'): ?> بالا <?php break; ?>
                                                <?php case ('critical'): ?> بحرانی <?php break; ?>
                                            <?php endswitch; ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-muted text-center">هیچ تسکی یافت نشد.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/workflow/workflow-system/resources/views/dashboard/index.blade.php ENDPATH**/ ?>