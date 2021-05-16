@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/forms.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="form">
    <h2>Crear Objectiu</h2>
    <form  method="POST" action="{{ route('dashboard.objetivos.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-group mt-1">
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
        <div class="form-group row  mt-1">
            <label for="fecha_inicio" class="col-2 col-form-label">Data Inici: </label>
            <div class="col-md-4">
              <input 
              class="form-control @error('fecha_inicio') is-invalid @enderror" 
              name="fecha_inicio" type="date" value="2011-08-19" id="fecha_inicio">
              @error('fecha_inicio')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>
            <label for="fecha_fin" class="col-2 col-form-label">Data Fi: </label>
            <div class="col-md-4">
                <input class="form-control @error('fecha_fin') is-invalid @enderror" 
                type="date" name="fecha_fin" id="fecha_fin" value="2011-08-20">
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
        <input type="hidden" name="ambito_id" value="{{ $ambito_id }}">
        <input type="submit" value="Crear Objectiu" class="btn btn-success">
    </form>
</div>

@endsection