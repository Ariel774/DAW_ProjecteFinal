@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/sub-objetivo/forms.css') }}" rel="stylesheet">
<link href="{{ asset('css/sub-objetivo/checkbuttons.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- Navegador -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/ambitos/{{ $ambito->slug }}">{{ $ambito->nombre }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.objetivos.show', ['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug])}}">{{ $objetivo->nombre }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear Sub-Objectiu</li>
    </ol>
</nav>
<!-- Navegador -->
<div class="form">
    <h2>Crear Sub-Objectiu</h2>
    <form  method="POST" action="{{ route('dashboard.sub-objetivos.store',['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug]) }}" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-group row mt-1">
            <div class="col-md-6">
                <label for="nombre">Nom: </label>
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
            <div class="col-md-6">
                <label for="unidades_realizar">Unitats diaries:</label>
                <div class="input-group">
                    <input 
                    id="unidades_realizar" 
                    name="unidades_realizar" 
                    value = "{{ old('unidades_realizar') }}" 
                    class="form-control @error('unidades_realizar') is-invalid @enderror" type="number"
                    placeholder="Unitats diaries a fer"
                    style="margin-right: 0px"
                    >
                    <div class="input-group-prepend">
                        <div class="input-group-text">{{ $objetivo->unidad }}</div>
                    </div>
                </div>
                @error('unidades_realizar')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row mt-1">
                <label for="nombre">Escull un o més dies: </label>
                <div class="weekDays-selector">
                    <input type="checkbox" name="dia[]" value=1 id="weekday-mon" class="weekday" />
                    <label for="weekday-mon">Dilluns</label>
                    <input type="checkbox" name="dia[]" value=2 id="weekday-tue" class="weekday" />
                    <label for="weekday-tue">Dimarts</label>
                    <input type="checkbox" name="dia[]" value=3 id="weekday-wed" class="weekday" />
                    <label for="weekday-wed">Dimecres</label>
                    <input type="checkbox" name="dia[]" value=4 id="weekday-thu" class="weekday" />
                    <label for="weekday-thu">Dijous</label>
                    <input type="checkbox" name="dia[]" value=5 id="weekday-fri" class="weekday" />
                    <label for="weekday-fri">Divendres</label>
                    <input type="checkbox" name="dia[]" value=6 id="weekday-sat" class="weekday" />
                    <label for="weekday-sat">Dissabte</label>
                    <input type="checkbox" name="dia[]" value=7 id="weekday-sun" class="weekday" />
                    <label for="weekday-sun">Diumenge</label>
                </div>
                @error('dia')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row  mt-1">
            <label for="hora_inicio" class="col-2 col-form-label">Hora Inici: </label>
            <div class="col-md-4">
              <input 
              class="form-control @error('hora_inicio') is-invalid @enderror" 
              name="hora_inicio" type="time" id="hora_inicio"
              value = "{{ old('hora_inicio') }}" >
              @error('hora_inicio')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>
            <label for="hora_fin" class="col-2 col-form-label">Hora Fi: </label>
            <div class="col-md-4">
                <input class="form-control @error('hora_fin') is-invalid @enderror" 
                type="time" name="hora_fin" id="hora_fin"
                value = "{{ old('hora_fin') }}" >
                @error('hora_fin')
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
        <input type="submit" value="Crear Objectiu" class="btn btn-success">
    </form>
</div>
@endsection