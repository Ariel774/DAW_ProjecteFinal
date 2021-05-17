@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/ambitos-show.css') }}" rel="stylesheet">
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $ambito->nombre }}</li>
    </ol>
</nav>
<div class="card mb-3">
    <img src="/storage/img/banner.jpg" height="100px" style="width: 100%; object-fit:cover" height="auto" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <h5 class="card-title h3">Àmbit: {{ $ambito->nombre }}</h5>
                <p class="card-text">{{ $ambito->descripcion }}</p>
                <p class="card-text"><small class="text-muted">Última actualització: {{ $ambito->updated_at }}</small></p>
            </div>
            <div class="col-sm-2">
                <form action="{{ route('dashboard.objetivos.create') }}" method="get">
                    <input type="hidden" name="ambito-id" value="{{ $ambito->id }}">
                    <input type="submit" class="btn btn-success" value="Crear Objectiu">
                </form>
            </div>
        </div>
    </div>
    <!-- Objetivos -->
    @foreach ($objetivos as $objetivo)
        <div class="card text-white bg-primary m-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">Objectiu - {{$loop->index+1}}</div>
                    <div class="col-md-2"> 
                        <eliminar-objetivo objetivo-id={{ $objetivo->id }}></eliminar-objetivo> {{-- Componente Vue --}}
                        <a href="{{ route('dashboard.objetivos.edit', ['objetivo' => $objetivo->id])}}" type="button" class="btn btn-info">Editar</a>
                    </div>
                </div>    
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="button-ambito">
                            <a href="{{ route('dashboard.objetivos.edit', ['objetivo' => $objetivo->id])}}"><span>Sub Objectius</span></a>
                        </div>
                    </div>
                    <div class="col-8">
                        <h5 class="card-title">{{ $objetivo->nombre }}</h5>
                        <p class="card-text">{{ $objetivo->descripcion}}</p>
                    </div>
                    <div class="col">
                        <img src="/storage/{{ $objetivo->imagen }}" class="img-ambito img-responsive rounded">
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    <!-- Fin Objetivos -->
</div>
{{ $objetivos->links() }}
@endsection