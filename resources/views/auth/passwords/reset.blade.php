@extends('auth.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ __('بازنشانی رمز عبور') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row mb-3">
                <label for="email" class="col-md-3 col-form-label text-md-end">
                    {{ __('آدرس ایمیل') }}
                </label>

                <div class="col-md-7">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label text-md-end">
                    {{ __('رمز عبور جدید') }}
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
                    {{ __('تایید رمز عبور جدید') }}
                </label>

                <div class="col-md-7">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-7 offset-md-3">
                    <button type="submit" class="btn btn-primary me-3">
                        {{ __('بازنشانی رمز عبور') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
