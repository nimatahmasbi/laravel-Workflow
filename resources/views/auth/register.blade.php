@extends('auth.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-user-plus me-2"></i>
        {{ __('ثبت‌نام در سیستم') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-3 col-form-label text-md-end">
                    {{ __('نام و نام خانوادگی') }}
                </label>

                <div class="col-md-7">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-3 col-form-label text-md-end">
                    {{ __('آدرس ایمیل') }}
                </label>

                <div class="col-md-7">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label text-md-end">
                    {{ __('رمز عبور') }}
                </label>

                <div class="col-md-7">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-3 col-form-label text-md-end">
                    {{ __('تایید رمز عبور') }}
                </label>

                <div class="col-md-7">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-7 offset-md-3">
                    <button type="submit" class="btn btn-primary me-3">
                        {{ __('ثبت‌نام') }}
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 offset-md-3">
                    <hr class="my-3">
                    <p class="text-muted mb-0">
                        {{ __('قبلاً ثبت‌نام کرده‌اید؟') }}
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold">
                            {{ __('وارد شوید') }}
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
