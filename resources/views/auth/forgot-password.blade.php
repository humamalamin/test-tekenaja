@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="d-flex flex-column-fluid flex-center">
        <!--begin::Signin-->
        <div class="login-form login-signin py-11">
            <!--begin::Form-->
            <form method="POST" action="{{ route('password.email') }}" class="form" novalidate="novalidate">
            @csrf
            <!--begin::Title-->
                <div class="text-center pb-8">
                    <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">
                        {{ __('Forgot Password?') }}
                    </h2>
                    <p class="text-muted font-weight-bold font-size-h4">
                        {{ __('Enter your email to reset your password') }}
                    </p>
                </div>
                <!--end::Title-->
                @if (session('status'))
                    <div class="alert alert-custom alert-light-success" role="alert">
                        <div class="alert-icon"><i class="flaticon-exclamation-2"></i></div>
                        <div class="alert-text">{{ session('status') }}</div>
                    </div>
                @endif
                @error('email')
                <div class="alert alert-custom alert-light-danger" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">{{ $message }}</div>
                </div>
            @enderror
            <!--begin::Form group-->
                <div class="form-group">
                    <input id="email" type="email"
                           class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <!--end::Form group-->
                <!--begin::Form group-->
                <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                    <button type="submit" id="kt_login_forgot_submit"
                            class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
                <!--end::Form group-->
            </form>
            <!--end::Form-->
        </div>
    </div>
@endsection
