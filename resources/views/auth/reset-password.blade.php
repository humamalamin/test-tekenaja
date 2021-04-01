@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="d-flex flex-column-fluid flex-center">
        <div class="login-form login-signin py-11">
            <form action="{{ route('password.update') }}" method="POST" class="form" novalidate="novalidate">
                @csrf
                <input type="hidden" name="token" value="{{ $request->token }}">
                <div class="text-center pb-8">
                    <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">
                        {{ __('Reset Password') }}
                    </h2>
                </div>
                @if (session()->has('login_error'))
                    <div class="alert alert-custom alert-light-danger" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                        <div class="alert-text">{{ session('login_error') }}</div>
                    </div>
                @endif
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark" for="email">
                        {{ __('Email Address') }}
                    </label>
                    <input id="email" type="email"
                           class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('email') is-invalid @enderror"
                           name="email" value="{{ $request->email ?? old('email') }}" required autocomplete="email" readonly>
                    @error('email')
                    <span class="form-text text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark" for="password">
                        {{ __('Password') }}
                    </label>
                    <input id="password" type="password"
                           class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="form-text text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark" for="password-confirm">
                        {{ __('Confirm Password') }}
                    </label>
                    <input id="password-confirm" type="password"
                           class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('password_confirmation') is-invalid @enderror"
                           name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                    <span class="form-text text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center pt-2">
                    <button type="submit" id="" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3"
                            tabindex="3">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
