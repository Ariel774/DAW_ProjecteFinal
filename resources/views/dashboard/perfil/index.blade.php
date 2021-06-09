@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/perfil/forms.css') }}" rel="stylesheet">
<link href="{{ asset('css/sub-objetivo/checkbuttons.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection
@section('content')
<!-- Navegador -->

<!-- Navegador -->
<div class="form">
    <h2 style="text-align: center">Editar Perfil</h2>
    <form  method="POST" action="{{ route('dashboard.perfil.update',['perfil' => $perfil->id]) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('put')
        <div class="form-group row mt-1">
            <div class="col-md-6">
                @if(Auth::user()->perfil->imagen != null )<img class="w-75 rounded-circle" alt="Image placeholder" src="/storage/{{ Auth::user()->perfil->imagen }}">
                @else <img class="w-75 rounded-circle" alt="Image placeholder" src="/storage/rp-default/default.jpg">
                @endif
            </div>
                <div class="col">
                    <label for="nombre">Nom: </label>
                    <input 
                    id="nombre" 
                    name="nombre" 
                    value = "{{ $perfil->usuario->name}} " 
                    class="form-control @error('nombre') is-invalid @enderror" type="text"
                    placeholder="Nom"
                    >
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
        </div>
        <div class="form-group row mt-1">
            <div class="col-md-12">
                <label for="biografia">Biografia</label>
                <input id="biografia" type="hidden" name="biografia"value="{{ $perfil->biografia }}">
                <trix-editor class="@error('biografia') is-invalid @enderror" input="biografia"></trix-editor>
                @error('biografia')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="col">
                <label for="imagen">Escull l'imatge</label>
                <input 
                id="imagen"
                type="file"
                class="form-control @error('imagen') is-invalid @enderror"
                name="imagen"
                >
                @error('imagen')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <input type="submit" value="Actualitzar" class="btn btn-success">
        <a class="btn btn-danger" href="{{ route('dashboard.home')}}">Cancelar</a>
    </form>
</div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer></script>
@endsection