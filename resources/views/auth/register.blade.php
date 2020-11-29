@extends('layouts.app')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row px-3 aqui">
        <div class="col-lg-10 col-xl-9 card flex-row mx-auto">
            <div class="img-left d-none d-md-flex"></div>
            <div class="card-body">
                <h4 class="title text-center mt-4">Registrarse</h4>
                <hr class="my-4">
                <form method="POST" action="{{ route('register') }}" class="form-box px-3">
                    @csrf
                    <div class="form-input">
                        <span><i class="fa fa-user"></i></span>
                        <input id="name" type="text" placeholder="Nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-input">
                        <span><i class="fa fa-envelope-o"></i></span>
                        <input id="email" type="email" placeholder="Correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-input">
                        <span><i class="fa fa-key"></i></span>
                        <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-input">
                        <span><i class="fa fa-key"></i></span>
                        <input id="password-confirm" type="password" placeholder="Repetir Contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-block text-uppercase">{{ __('Registrarse') }}</button>
                    </div>
                    
                    <hr class="my-4">
                    <div class="text-center mb-2">
                        <label>¿Aún no tiene una cuenta?</label>
                        <a href="{{ route('login') }}" class="register-link">Inicie Sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
