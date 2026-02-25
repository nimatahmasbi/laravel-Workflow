<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-tasks me-2"></i>
        تسک‌ها
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            تسک جدید
        </a>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <?php if($tasks->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-professional">
                    <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>گردش کار</th>
                            <th>مرحله</th>
                            <th>تخصیص داده شده به</th>
                            <th>وضعیت</th>
                            <th>اولویت</th>
                            <th>تاریخ پایان</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <strong><?php echo e($task->title); ?></strong>
                                <?php if($task->description): ?>
                                    <br><small class="text-muted"><?php echo e(Str::limit($task->description, 50)); ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-info"><?php echo e($task->workflow->title); ?></span>
                            </td>
                            <td><?php echo e($task->workflowStep->name); ?></td>
                            <td>
                                <?php if($task->assignee): ?>
                                    <?php echo e($task->assignee->name); ?>

                                <?php else: ?>
                                    <span class="text-muted">تخصیص داده نشده</span>
                                <?php endif; ?>
                            </td>
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
                            <td>
                                <?php if($task->due_date): ?>
                                    <?php echo e($task->due_date->format('Y/m/d')); ?>

                                <?php else: ?>
                                    <span class="text-muted">تعیین نشده</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?php echo e(route('tasks.show', $task)); ?>" class="btn btn-info" title="مشاهده">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('tasks.edit', $task)); ?>" class="btn btn-warning" title="ویرایش">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('tasks.destroy', $task)); ?>" method="POST" class="d-inline">
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
                <?php echo e($tasks->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-4">
                <i class="fas fa-tasks fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">هیچ تسکی یافت نشد</h5>
                <p class="text-muted">برای شروع، اولین تسک را ایجاد کنید.</p>
                <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    ایجاد تسک
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/workflow/workflow-system/resources/views/tasks/index.blade.php ENDPATH**/ ?>