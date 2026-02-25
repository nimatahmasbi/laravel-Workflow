@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-tasks me-2"></i>
        جزئیات تسک
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i>
            ویرایش
        </a>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
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
                    اطلاعات تسک
                </h6>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-tasks fa-2x text-primary me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">عنوان</h6>
                                <h5 class="mb-0 text-overflow-safe">{{ $task->title }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-project-diagram fa-2x text-success me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">گردش کار</h6>
                                <h5 class="mb-0">{{ $task->workflow->title }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-layer-group fa-2x text-info me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">مرحله</h6>
                                <h5 class="mb-0">{{ $task->workflowStep->name }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-toggle-on fa-2x {{ $task->status == 'completed' ? 'text-success' : ($task->status == 'in_progress' ? 'text-warning' : 'text-danger') }} me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">وضعیت</h6>
                                <h5 class="mb-0">
                                    @switch($task->status)
                                        @case('pending') <span class="badge bg-warning">در انتظار</span> @break
                                        @case('in_progress') <span class="badge bg-info">در حال انجام</span> @break
                                        @case('completed') <span class="badge bg-success">تکمیل شده</span> @break
                                        @case('rejected') <span class="badge bg-danger">رد شده</span> @break
                                        @case('on_hold') <span class="badge bg-secondary">متوقف شده</span> @break
                                    @endswitch
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
                                    @switch($task->priority)
                                        @case('low') <span class="badge bg-success">پایین</span> @break
                                        @case('medium') <span class="badge bg-warning">متوسط</span> @break
                                        @case('high') <span class="badge bg-danger">بالا</span> @break
                                        @case('critical') <span class="badge bg-dark">بحرانی</span> @break
                                    @endswitch
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                @if($task->description)
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="text-muted mb-2">
                            <i class="fas fa-align-left me-2"></i>
                            توضیحات
                        </h6>
                        <p class="mb-0 p-3 bg-light rounded text-overflow-safe">{{ $task->description }}</p>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-6 mb-3">
                        @if($task->assignee)
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-user text-primary me-2"></i>
                            <span class="text-muted">تخصیص داده شده به:</span>
                            <span class="ms-2 fw-bold">{{ $task->assignee->name }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="col-md-6 mb-3">
                        @if($task->due_date)
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-calendar-check text-primary me-2"></i>
                            <span class="text-muted">تاریخ پایان:</span>
                            <span class="ms-2 fw-bold">{{ $task->due_date->format('Y/m/d') }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-2"></i>
                                ویرایش تسک
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این تسک را حذف کنید؟')">
                                    <i class="fas fa-trash me-2"></i>
                                    حذف تسک
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
