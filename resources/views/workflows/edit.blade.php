@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-edit me-2"></i>
        ویرایش گردش کار
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('workflows.show', $workflow) }}" class="btn btn-info me-2">
            <i class="fas fa-eye me-2"></i>
            مشاهده
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
                    <i class="fas fa-edit me-2"></i>
                    ویرایش اطلاعات گردش کار
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('workflows.update', $workflow) }}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="title" class="col-md-3 col-form-label text-md-end">
                            عنوان <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-7">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                   name="title" value="{{ old('title', $workflow->title) }}" required autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-3 col-form-label text-md-end">
                            توضیحات
                        </label>
                        <div class="col-md-7">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                      name="description" rows="4">{{ old('description', $workflow->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="department_id" class="col-md-3 col-form-label text-md-end">
                            دپارتمان <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-7">
                            <select id="department_id" class="form-control @error('department_id') is-invalid @enderror" name="department_id" required>
                                <option value="">انتخاب دپارتمان</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id', $workflow->department_id) == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="status" class="col-md-3 col-form-label text-md-end">
                            وضعیت
                        </label>
                        <div class="col-md-7">
                            <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="active" {{ old('status', $workflow->status) == 'active' ? 'selected' : '' }}>فعال</option>
                                <option value="inactive" {{ old('status', $workflow->status) == 'inactive' ? 'selected' : '' }}>غیرفعال</option>
                                <option value="archived" {{ old('status', $workflow->status) == 'archived' ? 'selected' : '' }}>آرشیو شده</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="priority" class="col-md-3 col-form-label text-md-end">
                            اولویت
                        </label>
                        <div class="col-md-7">
                            <select id="priority" class="form-control @error('priority') is-invalid @enderror" name="priority">
                                <option value="1" {{ old('priority', $workflow->priority) == 1 ? 'selected' : '' }}>پایین</option>
                                <option value="2" {{ old('priority', $workflow->priority) == 2 ? 'selected' : '' }}>متوسط</option>
                                <option value="3" {{ old('priority', $workflow->priority) == 3 ? 'selected' : '' }}>بالا</option>
                                <option value="4" {{ old('priority', $workflow->priority) == 4 ? 'selected' : '' }}>بحرانی</option>
                            </select>
                            @error('priority')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="start_date" class="col-md-3 col-form-label text-md-end">
                            تاریخ شروع
                        </label>
                        <div class="col-md-7">
                            <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror"
                                   name="start_date" value="{{ old('start_date', $workflow->start_date ? $workflow->start_date->format('Y-m-d') : '') }}">
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="due_date" class="col-md-3 col-form-label text-md-end">
                            تاریخ پایان
                        </label>
                        <div class="col-md-7">
                            <input id="due_date" type="date" class="form-control @error('due_date') is-invalid @enderror"
                                   name="due_date" value="{{ old('due_date', $workflow->due_date ? $workflow->due_date->format('Y-m-d') : '') }}">
                            @error('due_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary me-3">
                                <i class="fas fa-save me-2"></i>
                                ذخیره تغییرات
                            </button>
                            <a href="{{ route('workflows.show', $workflow) }}" class="btn btn-danger">
                                <i class="fas fa-times me-2"></i>
                                انصراف
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
