@extends('auth.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-sign-in-alt me-2"></i>
        {{ __('ورود به سیستم') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-3">
                <label for="email" class="col-md-3 col-form-label text-md-end">
                    {{ __('آدرس ایمیل') }}
                </label>

                <div class="col-md-7">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-7 offset-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('مرا به خاطر بسپار') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-7 offset-md-3">
                    <button type="submit" class="btn btn-primary me-3">
                        {{ __('ورود') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('رمز عبور خود را فراموش کرده‌اید؟') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 offset-md-3">
                    <hr class="my-3">
                    <p class="text-muted mb-0">
                        {{ __('حساب کاربری ندارید؟') }}
                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold">
                            {{ __('ثبت‌نام کنید') }}
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
