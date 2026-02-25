@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-building me-2"></i>
        ایجاد دپارتمان جدید
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-right me-2"></i>
            بازگشت
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="dashboard-card">
            <div class="card-header-professional">
                <h6>
                    <i class="fas fa-plus me-2"></i>
                    اطلاعات دپارتمان
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('departments.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label text-md-end">
                            نام دپارتمان <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-7">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
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
                        <label for="manager_name" class="col-md-3 col-form-label text-md-end">
                            نام مدیر
                        </label>
                        <div class="col-md-7">
                            <input id="manager_name" type="text" class="form-control @error('manager_name') is-invalid @enderror"
                                   name="manager_name" value="{{ old('manager_name') }}">
                            @error('manager_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-3 col-form-label text-md-end">
                            شماره تماس
                        </label>
                        <div class="col-md-7">
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label text-md-end">
                            ایمیل
                        </label>
                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="is_active" class="col-md-3 col-form-label text-md-end">
                            وضعیت
                        </label>
                        <div class="col-md-7">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                       {{ old('is_active') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    فعال
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary me-3">
                                <i class="fas fa-save me-2"></i>
                                ایجاد دپارتمان
                            </button>
                            <a href="{{ route('departments.index') }}" class="btn btn-danger">
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
