
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="assets/css/auth.css">


@extends('layouts.app')

@section('content')
    <div class="content mt-5">
        <div class="row justify-content-center mt-5 c">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Login') }}</h1>

                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input id="email" placeholder="{{ __('Email') }}" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input id="password" placeholder="{{ __('Contraseña') }}" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 ">
                                    <div class="form-check remember">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="t">
                                    <button type="submit" class="float-right  btn btn-primary login_btn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center links">

                                    @if (Route::has('register'))
                                        <a class="btn btn-link " href="{{ route('register') }}">
                                            {{ __('Register') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center links">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="assets/js/login.js"></script>
