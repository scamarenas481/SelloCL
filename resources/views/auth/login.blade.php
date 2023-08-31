@extends('layouts.login')

@section('content')
    <div class="login-container">
        <div class="login-content">
            <div class="row d-flex align-items-center justify-content-center">
                <!-- División para el formulario -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="logo-container" style="margin: auto">
                            <img src="/images/logoCL1sello.svg" alt="Construrama Casa Lupita Logo">
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
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
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password"
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
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Recuerdame') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ingresar') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- División para la imagen -->
                <div class="col-md-6 d-none d-md-block">
                    <div class="image-container">
                        <img src="/images/20220920_170911-1.jpg" alt="Construrama Casa Lupita Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
