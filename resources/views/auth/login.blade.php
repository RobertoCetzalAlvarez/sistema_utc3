@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Universidad Tecnológica del Centro')])

@section('content')
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-md-9 ml-auto mr-auto mb-10 text-center">
            <h3>{{ __('Iniciar Sesión') }}</h3>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-8 ml-auto mr-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="card card-login card-hidden mb-5">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title"><strong>{{ __('Acceder con:') }}</strong></h4>
                        <div class="social-line">
                            <a href="#" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <p class="card-description text-center">{{ __('Ingresa tus datos') }}</p>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                    <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                        {{ __('Correo') }}
                                    </span>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                 name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">
                                    <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                    {{ __('Contraseña') }}
                                    </span>
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Acceder') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection