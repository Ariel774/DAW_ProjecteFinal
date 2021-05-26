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
        <li class="breadcrumb-item active" aria-current="page">Editar Sub-Objectiu</li>
    </ol>
</nav>
<!-- Navegador -->
<div class="form">
    <h2>Editar Sub-Objectiu</h2>
    <form  method="POST" action="{{ route('dashboard.sub-objetivos.store',['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug]) }}" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-group row mt-1">
            <div class="col-md-6">
                <label for="nombre">Nom: </label>
                <input 
                id="nombre" 
                name="nombre" 
                value = "{{ $subObjetivo->nombre }}" 
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
                <label for="unidades_realizar">Unitats diaries:</label>
                <div class="input-group">
                    <input 
                    id="unidades_realizar" 
                    name="unidades_realizar" 
                    value = "{{ $subObjetivo->unidades_realizar }}" 
                    class="form-control @error('unidades_realizar') is-invalid @enderror" type="number"
                    placeholder="Unitats"
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
            <div class="col-md-2">
                <label for="unidades_realizar">Color:</label>
                <input type="color" id="color" name="color" value="{{ $calendario->color }}" class="form-control @error('color') is-invalid @enderror">
                @error('color')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row mt-1">
                <label for="nombre">Escull un o més dies: </label>
                <div class="weekDays-selector">
                    <input type="checkbox" name="dias[]" value=1 id="weekday-mon" class="weekday"
                    {{  Str::contains($calendario->daysOfWeek, 1) ? 'checked' : '' }}
                    />
                    <label for="weekday-mon">Dilluns</label>
                    <input type="checkbox" name="dias[]" value=2 id="weekday-tue" class="weekday" 
                    {{  Str::contains($calendario->daysOfWeek, 2) ? 'checked' : '' }}
                    />
                    <label for="weekday-tue">Dimarts</label>
                    <input type="checkbox" name="dias[]" value=3 id="weekday-wed" class="weekday" 
                    {{  Str::contains($calendario->daysOfWeek, 3) ? 'checked' : '' }}
                    />
                    <label for="weekday-wed">Dimecres</label>
                    <input type="checkbox" name="dias[]" value=4 id="weekday-thu" class="weekday" 
                    {{  Str::contains($calendario->daysOfWeek, 4) ? 'checked' : '' }}
                    />
                    <label for="weekday-thu">Dijous</label>
                    <input type="checkbox" name="dias[]" value=5 id="weekday-fri" class="weekday" 
                    {{  Str::contains($calendario->daysOfWeek, 5) ? 'checked' : '' }}
                    />
                    <label for="weekday-fri">Divendres</label>
                    <input type="checkbox" name="dias[]" value=6 id="weekday-sat" class="weekday" 
                    {{  Str::contains($calendario->daysOfWeek, 6) ? 'checked' : '' }}
                    />
                    <label for="weekday-sat">Dissabte</label>
                    <input type="checkbox" name="dias[]" value=0 id="weekday-sun" class="weekday" 
                    {{  Str::contains($calendario->daysOfWeek, 0) ? 'checked' : '' }}
                    />
                    <label for="weekday-sun">Diumenge</label>
                </div>
                @error('dias')
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
              value = "{{ $calendario->startTime }}" >
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
                value = "{{ $calendario->endTime  }}" >
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
            class="form-control @error('descripcion') is-invalid @enderror">{{ $subObjetivo->descripcion }}</textarea>
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