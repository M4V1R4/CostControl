@extends('layouts.app')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row px-3 aqui">
        <div class="col-lg-10 col-xl-9 card flex-row mx-auto">
            <div class="img-left d-none d-md-flex"></div>
            <div class="card-body">
                <h4 class="title text-center mt-4">Iniciar Sesión</h4>
                <hr class="my-4">
                <form method="POST" action="{{ route('login') }}" class="form-box px-3">
                    @csrf
                    <div class="form-input">
                        <span><i class="fa fa-envelope-o"></i></span>
                        <input id="email" type="email" placeholder="Correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-input">
                        <span><i class="fa fa-key"></i></span>
                        <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-block text-uppercase">{{ __('Iniciar Sesión') }}</button>
                    </div>
                    <div class="text-center mb-3">
                        <label>O iniciar con</label>
                    </div>
                    <div class="row mb-3">
                        <a class="btn btn-block btn-social btn-google" href="{{ route('google.login') }}">
                        <i class="fa fa-google"></i>Google</a>
                    </div>
                    <div class="row mb-3">
                        <a class="btn btn-block btn-social btn-facebook" href="#">
                        <i class="fa fa-facebook"></i>Facebook</a>
                    </div>
                    <hr class="my-4">
                    <div class="text-center mb-2">
                        <label>¿No tiene una cuenta?</label>
                        <a href="{{ route('register') }}" class="register-link">Registrese aquí</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
