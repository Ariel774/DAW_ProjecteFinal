@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/forms-edit.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Navegador -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/ambitos/{{ $objetivo->ambito_id }}">Objetivos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear Objectiu</li>
    </ol>
</nav>
<!-- Navegador -->
<div class="form">
    <h2>Editar Objectiu</h2>
    <form  method="POST" action="{{ route('dashboard.objetivos.update', ['objetivo' => $objetivo->id ] ) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('put')
        <div class="form-group row mt-1">
            <div class="col-md-4">
                <label for="nombre">Nom objectiu:</label>
                <input 
                id="nombre" 
                name="nombre" 
                value = "{{ $objetivo->nombre }}" 
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
                id="unidades" 
                name="unidades" 
                value = "{{ $objetivo->unidades }}" 
                class="form-control @error('unidades') is-invalid @enderror" type="number"
                placeholder="Unitats a aconseguir"
                >
                @error('unidades')
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
                value = "{{ $objetivo->unidad }}" 
                class="form-control @error('unidad') is-invalid @enderror" type="text"
                placeholder="km/m/pàgines/$/€/hores..."
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
              name="fecha_inicio" type="date" value="{{ $objetivo->fecha_inicio }}" id="fecha_inicio">
              @error('fecha_inicio')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>
            <label for="fecha_fin" class="col-2 col-form-label">Data Fi: </label>
            <div class="col-md-4">
                <input class="form-control @error('fecha_fin') is-invalid @enderror" 
                type="date" name="fecha_fin" id="fecha_fin" value="{{ $objetivo->fecha_fin }}">
                @error('fecha_fin')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
          </div>
        <div class="form-group mt-1">
            <label for="descripcion">Descripció:</label>
            <textarea id="descripcion" 
            placeholder="Descripció" 
            name="descripcion" 
            class="form-control @error('descripcion') is-invalid @enderror">{{ $objetivo->descripcion }} 
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
            <div class="mt-4">
                <p>Imatge Actual:</p>
                <img src="/storage/{{$objetivo->imagen}}" style="width:300px">
            </div>
            @error('imagen')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <input type="hidden" name="ambito_id" value="">
        <input type="submit" value="Actualitzar Objectiu" class="btn btn-primary">
    </form>
</div>

@endsection