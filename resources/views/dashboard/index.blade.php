@extends('layouts.app')

@section('content')
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
                        <div class="dashboard-stat-value">{{ $stats['total_departments'] }}</div>
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
                        <div class="dashboard-stat-value">{{ $stats['total_workflows'] }}</div>
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
                        <div class="dashboard-stat-value">{{ $stats['total_tasks'] }}</div>
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
                        <div class="dashboard-stat-value">{{ $stats['pending_tasks'] }}</div>
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
                <a href="{{ route('workflows.index') }}" class="btn-professional">
                    مشاهده همه
                </a>
            </div>
            <div class="card-body">
                @if($recent_workflows->count() > 0)
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
                                @foreach($recent_workflows as $workflow)
                                <tr>
                                    <td>
                                        <a href="{{ route('workflows.show', $workflow) }}" class="link-professional">
                                            {{ $workflow->title }}
                                        </a>
                                    </td>
                                    <td>{{ $workflow->department->name }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $workflow->status }}">
                                            @switch($workflow->status)
                                                @case('active') فعال @break
                                                @case('inactive') غیرفعال @break
                                                @case('archived') آرشیو شده @break
                                            @endswitch
                                        </span>
                                    </td>
                                    <td>
                                        <span class="priority-badge priority-{{ $workflow->priority }}">
                                            @switch($workflow->priority)
                                                @case(1) پایین @break
                                                @case(2) متوسط @break
                                                @case(3) بالا @break
                                                @case(4) بحرانی @break
                                            @endswitch
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center">هیچ گردش کاری یافت نشد.</p>
                @endif
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
                <a href="{{ route('tasks.index') }}" class="btn-professional">
                    مشاهده همه
                </a>
            </div>
            <div class="card-body">
                @if($recent_tasks->count() > 0)
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
                                @foreach($recent_tasks as $task)
                                <tr>
                                    <td>
                                        <a href="{{ route('tasks.show', $task) }}" class="link-professional">
                                            {{ $task->title }}
                                        </a>
                                    </td>
                                    <td>{{ $task->workflow->title }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $task->status }}">
                                            @switch($task->status)
                                                @case('pending') در انتظار @break
                                                @case('in_progress') در حال انجام @break
                                                @case('completed') تکمیل شده @break
                                                @case('rejected') رد شده @break
                                                @case('on_hold') متوقف شده @break
                                            @endswitch
                                        </span>
                                    </td>
                                    <td>
                                        <span class="priority-badge priority-{{ $task->priority }}">
                                            @switch($task->priority)
                                                @case('low') پایین @break
                                                @case('medium') متوسط @break
                                                @case('high') بالا @break
                                                @case('critical') بحرانی @break
                                            @endswitch
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center">هیچ تسکی یافت نشد.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
