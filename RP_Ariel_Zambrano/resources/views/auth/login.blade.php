@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}" class="login100-form" id="formulari" novalidate>
    @csrf
    <div class="login100-form-avatar">
        <img src="/storage/img/resource-planning.png" alt="AVATAR">
    </div>

    <span class="login100-form-title mb-5">
        RP Personal
    </span>
    <div class="wrap-input100 mt-1">
        <input id="email" type="email" placeholder="Correu" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-user" id="fa-correu"></i>
        </span>
        @error('email')
        <span class="invalid-feedback" id="correu_span" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="wrap-input100 mt-1">
        <input id="password" type="password" placeholder="Contrasenya" class="input100 form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="password" autofocus>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" id="fa-password"></i>        
        </span>
        @error('password')
        <span class="invalid-feedback" id="password_span" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="container-login100-form-btn mt-5">
        <button class="login100-form-btn" type="submit">
            Login
        </button>
    </div>

    <div class="text-center w-full">
        <a href="#" class="txt1">
            T'has oblidat de la contrasenya?
        </a>
    </div>

    <div class="text-center w-full">
        <a class="txt1" href="{{ route('register') }}">
            Crear nou compte
            <i class="fas fa-arrow-right"></i>        
        </a>
    </div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/form/login-form.js') }}" defer></script>
@endsection

