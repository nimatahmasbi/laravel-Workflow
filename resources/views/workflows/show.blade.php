@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-project-diagram me-2"></i>
        جزئیات گردش کار
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('workflows.edit', $workflow) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i>
            ویرایش
        </a>
        <a href="{{ route('workflows.index') }}" class="btn btn-secondary">
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
                                <h5 class="mb-0 text-overflow-safe">{{ $workflow->title }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-building fa-2x text-success me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">دپارتمان</h6>
                                <h5 class="mb-0">{{ $workflow->department->name }}</h5>
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
                                <h5 class="mb-0">{{ $workflow->creator->name }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-toggle-on fa-2x {{ $workflow->status == 'active' ? 'text-success' : 'text-danger' }} me-3"></i>
                            <div>
                                <h6 class="mb-1 text-muted">وضعیت</h6>
                                <h5 class="mb-0">
                                    @switch($workflow->status)
                                        @case('active') <span class="badge bg-success">فعال</span> @break
                                        @case('inactive') <span class="badge bg-danger">غیرفعال</span> @break
                                        @case('archived') <span class="badge bg-secondary">آرشیو شده</span> @break
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
                                    @switch($workflow->priority)
                                        @case(1) <span class="badge bg-success">پایین</span> @break
                                        @case(2) <span class="badge bg-warning">متوسط</span> @break
                                        @case(3) <span class="badge bg-danger">بالا</span> @break
                                        @case(4) <span class="badge bg-dark">بحرانی</span> @break
                                    @endswitch
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                @if($workflow->description)
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="text-muted mb-2">
                            <i class="fas fa-align-left me-2"></i>
                            توضیحات
                        </h6>
                        <p class="mb-0 p-3 bg-light rounded text-overflow-safe">{{ $workflow->description }}</p>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-6 mb-3">
                        @if($workflow->start_date)
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-calendar-plus text-primary me-2"></i>
                            <span class="text-muted">تاریخ شروع:</span>
                            <span class="ms-2 fw-bold">{{ $workflow->start_date->format('Y/m/d') }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="col-md-6 mb-3">
                        @if($workflow->due_date)
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-calendar-check text-primary me-2"></i>
                            <span class="text-muted">تاریخ پایان:</span>
                            <span class="ms-2 fw-bold">{{ $workflow->due_date->format('Y/m/d') }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="{{ route('workflows.edit', $workflow) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-2"></i>
                                ویرایش گردش کار
                            </a>
                            <form action="{{ route('workflows.destroy', $workflow) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
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
@endsection
