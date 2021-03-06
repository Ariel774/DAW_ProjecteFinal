@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/forms.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Navegador -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/ambitos/{{ $ambito->slug }}">{{ $ambito->nombre }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $objetivo->nombre }}Crea Objectiu</li>
    </ol>
</nav>
<!-- Navegador -->
<!-- Formulario -->
<div class="form">
    <h2>Crear Objectiu</h2>
    <form  method="POST" action="{{ route('dashboard.objetivos.store',['ambito' => $ambito->slug]) }}" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-group row mt-1">
            <div class="col-md-4">
                <label for="nombre">Nom objectiu:</label>
                <input 
                id="nombre" 
                name="nombre" 
                value = "{{ old('nombre') }}" 
                class="form-control @error('nombre') is-invalid @enderror" type="text"
                placeholder="Nom"
                >
                @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="nombre">Unitats:</label>
                <input 
                id="unidades_fin" 
                name="unidades_fin" 
                value = "{{ old('unidades_fin') }}" 
                class="form-control @error('unidades_fin') is-invalid @enderror" type="number"
                placeholder="Unitats a aconseguir"
                >
                @error('unidades_fin')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="nombre">Unitat:</label>
                <input 
                id="unidad" 
                name="unidad" 
                value = "{{ old('unidad') }}" 
                class="form-control @error('unidad') is-invalid @enderror" type="text"
                placeholder="km/m/p??gines/$/???/hores..."
                >
                @error('unidad')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row  mt-1">
            <label for="fecha_inicio" class="col-2 col-form-label">Data Inici: </label>
            <div class="col-md-4">
              <input 
              class="form-control @error('fecha_inicio') is-invalid @enderror" 
              name="fecha_inicio" type="date" value="{{ $todayDate }}" min="{{ $todayDate }}" id="fecha_inicio">
              @error('fecha_inicio')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>
            <label for="fecha_fin" class="col-2 col-form-label">Data Fi: </label>
            <div class="col-md-4">
                <input class="form-control @error('fecha_fin') is-invalid @enderror" 
                type="date" name="fecha_fin" id="fecha_fin" value="{{ $todayDate }}" min="{{ $todayDate }}">
                @error('fecha_fin')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
          </div>
        <div class="form-group mt-1">
            <label for="descripcion">Descripci??:</label>
            <textarea id="descripcion" 
            placeholder="Descripci??" 
            name="descripcion" 
            class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion') }} 
            </textarea>
            @error('descripcion')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group mt-1">
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
        <input type="submit" value="Crear Objectiu" class="btn btn-success">
        <a class="btn btn-danger" href="/dashboard/ambitos/{{ $ambito->slug }}">Cancelar</a>
    </form>
</div>
<!-- Formulario -->

@endsection
