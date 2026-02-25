@extends('auth.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('تایید رمز عبور') }}</div>

    <div class="card-body">
        {{ __('لطفاً قبل از ادامه، رمز عبور خود را تایید کنید.') }}

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('رمز عبور') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('تایید رمز عبور') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
