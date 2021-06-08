@extends('layouts.dashboard')
@section('styles')
<link href="{{ asset('css/ambitos-show.css') }}" rel="stylesheet">
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Tasques </li>
    </ol>
</nav>
<div class="card mb-3">
    <img src="/storage/img/banner.jpg" height="100px" style="width: 100%; object-fit:cover" height="auto" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <h5 class="card-title h3">Tasques diares: {{ $todayDate }} </h5>
            </div>
        </div>
    </div>
    <!-- Objetivos -->
    @if($tareas->count() > 0)
    @foreach ($tareas as $tarea) 
    <div class="card-ambito card text-black bg-info ml-3 mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10"><h4>Tasca - {{$loop->index+1}}</h4></div>
                <div class="col-md-2"> 
                    <h4 class="text-white">{{$tarea->fecha_tarea}}</h4>
                </div>
            </div>    
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2">
                    <div class="button-ambito">
                        <a class="btn-a" href="#"><i class="fas fa-info-circle"></i></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="button-ambito">
                        <completar-tarea :data="{{$tarea}}"></completar-tarea>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h5 class="card-title">{{ $tarea->titulo }}</h5>
                    <p class="card-text"> {{ $tarea->subtitulo }}, unitats a fer {{ $tarea->unidades_realizar}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <h2 class="text-center mb-4">NO HI HAN TASQUES AVUI</h2>
    @endif
    <!-- Fin Objetivos -->
</div>
<!-- Fi Modal Boostrap -->
{{ $tareas->links() }}
@endsection