@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Verifica la teva adreça de correu  ') }}<i class="fas fa-envelope-open-text"></i></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nou missatge ha sigut reenviat al teu compte de correu.') }}
                        </div>
                    @endif

                    {{ __('Abans de procedir, si us plau confirma el teu correu.') }}
                    {{ __('Si no has rebut el teu correu:') }} <br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Fes click aqui per rebre un altre.') }}</button>
                    </form>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-dark"><i class="fas fa-arrow-left"></i>Tornar a l' inici</button>
            </form>
        </div>
    </div>
</div>
@endsection
