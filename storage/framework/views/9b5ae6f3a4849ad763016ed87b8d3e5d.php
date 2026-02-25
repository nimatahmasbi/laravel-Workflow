<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-building me-2"></i>
        دپارتمان‌ها
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            دپارتمان جدید
        </a>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <?php if($departments->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-professional">
                    <thead>
                        <tr>
                            <th>نام دپارتمان</th>
                            <th>توضیحات</th>
                            <th>مدیر</th>
                            <th>تماس</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <strong><?php echo e($department->name); ?></strong>
                            </td>
                            <td><?php echo e(Str::limit($department->description, 50)); ?></td>
                            <td><?php echo e($department->manager_name); ?></td>
                            <td>
                                <?php if($department->phone): ?>
                                    <div><i class="fas fa-phone me-1"></i><?php echo e($department->phone); ?></div>
                                <?php endif; ?>
                                <?php if($department->email): ?>
                                    <div><i class="fas fa-envelope me-1"></i><?php echo e($department->email); ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($department->is_active): ?>
                                    <span class="badge bg-success">فعال</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">غیرفعال</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?php echo e(route('departments.show', $department)); ?>" class="btn btn-info" title="مشاهده">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('departments.edit', $department)); ?>" class="btn btn-warning" title="ویرایش">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('departments.destroy', $department)); ?>" method="POST" class="d-inline">
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
                <?php echo e($departments->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-4">
                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">هیچ دپارتمانی یافت نشد</h5>
                <p class="text-muted">برای شروع، اولین دپارتمان را ایجاد کنید.</p>
                <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    ایجاد دپارتمان
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/workflow/workflow-system/resources/views/departments/index.blade.php ENDPATH**/ ?>