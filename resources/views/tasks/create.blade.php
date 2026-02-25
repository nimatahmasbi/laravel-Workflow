@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-tasks me-2"></i>
        ایجاد تسک جدید
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
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
                    <i class="fas fa-plus me-2"></i>
                    اطلاعات تسک
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="title" class="col-md-3 col-form-label text-md-end">
                            عنوان <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-7">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                   name="title" value="{{ old('title') }}" required autofocus>
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
                                      name="description" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="workflow_id" class="col-md-3 col-form-label text-md-end">
                            گردش کار <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-7">
                            <select id="workflow_id" class="form-control @error('workflow_id') is-invalid @enderror" name="workflow_id" required>
                                <option value="">انتخاب گردش کار</option>
                                @foreach($workflows as $workflow)
                                    <option value="{{ $workflow->id }}" {{ old('workflow_id') == $workflow->id ? 'selected' : '' }}>
                                        {{ $workflow->title }} - {{ $workflow->department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('workflow_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="workflow_step_id" class="col-md-3 col-form-label text-md-end">
                            مرحله <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-7">
                            <select id="workflow_step_id" class="form-control @error('workflow_step_id') is-invalid @enderror" name="workflow_step_id" required>
                                <option value="">انتخاب مرحله</option>
                                @foreach($workflowSteps as $step)
                                    <option value="{{ $step->id }}" {{ old('workflow_step_id') == $step->id ? 'selected' : '' }}>
                                        {{ $step->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('workflow_step_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="assignee_id" class="col-md-3 col-form-label text-md-end">
                            تخصیص به
                        </label>
                        <div class="col-md-7">
                            <select id="assignee_id" class="form-control @error('assignee_id') is-invalid @enderror" name="assignee_id">
                                <option value="">انتخاب کاربر</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('assignee_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assignee_id')
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
                                <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>پایین</option>
                                <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>متوسط</option>
                                <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>بالا</option>
                                <option value="critical" {{ old('priority') == 'critical' ? 'selected' : '' }}>بحرانی</option>
                            </select>
                            @error('priority')
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
                                   name="due_date" value="{{ old('due_date') }}">
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
                                ایجاد تسک
                            </button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-danger">
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
