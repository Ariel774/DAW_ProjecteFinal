@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}" class="login100-form" id="formulari" novalidate>
    @csrf
    <div class="login100-form-avatar">
        <img src="/storage/img/resource-planning.png" alt="AVATAR">
    </div>

    <span class="login100-form-title mb-5">
        RP Personal
    </span>
    
    <div class="wrap-input100 mt-1">
        <input id="name" type="text" placeholder="Nom" class="input100 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-user" id="fa-name"></i>
        </span>
        @error('name')
        <span class="invalid-feedback" id="name_span" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="wrap-input100 mt-1">
        <input id="email" type="email" placeholder="Correu" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fas fa-at" id="fa-correu"></i>
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
            <i class="fas fa-key" id="fa-password"></i>        
        </span>
        @error('password')
        <span class="invalid-feedback" id="password_span" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="wrap-input100 mt-1">
        <input id="password-confirm" type="password" placeholder="Repeteix la contrasenya" class="input100 form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" value="" required autocomplete="ppassword_confirmation" autofocus>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" id="fa-password-confirm"></i>        
        </span>
        {{-- @error('password-confirm')
        <span class="invalid-feedback" id="password-span-confirm" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror --}}
    </div>
    <div class="container-login100-form-btn mt-5">
        <button class="login100-form-btn" type="submit">
            Regisrar-se
        </button>
    </div>

</form>
@endsection
@section('scripts')
<script src="{{ asset('js/form/register-form.js') }}" defer></script>
@endsection
