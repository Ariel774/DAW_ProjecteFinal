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
                @if($ambitosTotales > 3)
                    <eliminar-ambito ambito-slug={{ $ambito->slug }}></eliminar-ambito> {{-- Componente Vue --}}
                @endif
                <button class="btn btn-primary show-modal" data-toggle="modal" data-target="#ambitModal">Editar</button>
                <p class="card-text">{{ $ambito->descripcion }}</p>
                <p class="card-text"><small class="text-muted">Última actualització: {{ $ambito->updated_at }}</small></p>
            </div>
            <div class="col-sm-2">
                <a href="{{ route('dashboard.objetivos.create', ['ambito' => $ambito->slug])}}" type="button" class="btn btn-success">Crear Objectiu</a>
            </div>
        </div>
    </div>
    <!-- Objetivos -->
    @foreach ($objetivos as $objetivo) 
        <div class="card-ambito card text-white bg-primary ml-3 mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">Objectiu - {{$loop->index+1}}</div>
                    <div class="col-md-2"> 
                        <eliminar-objetivo objetivo-id={{ $objetivo->id }}></eliminar-objetivo> {{-- Componente Vue --}}
                        <a href="{{ route('dashboard.objetivos.edit', ['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug])}}" type="button" class="btn btn-info">Editar</a>
                    </div>
                </div>    
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="button-ambito">
                            <a href="{{ route('dashboard.objetivos.show', ['ambito' => $ambito->slug, 'objetivo' => $objetivo->slug])}}"><span>Sub Objectius</span></a>
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
<div class="modal fade bd-example-modal-lg" id="ambitModal" tabindex="-1" role="dialog" aria-labelledby="ambitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title text-primary" id="ambitModalLabel">Actualitzar Àmbits</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Contingut del Modal -->
            <form action="{{ route('dashboard.ambitos.update', ['ambito' => $ambito->slug ]) }}" method="POST" novalidate>
                @csrf
                @method('put')
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-hover table-sortable" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            Nom Àmbit
                                        </th>
                                        <th class="text-center">
                                            Descripció
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            {{ $ambito->nombre }}
                                        </td>
                                        <td class="text-center">
                                            {{ $ambito->descripcion }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Àmbits</button>
                </div>
            </form>
        <!-- Fi del contingut del modal -->
        </div>
        </div>
    </div>
    </div>
<!-- Fi Modal Boostrap -->
{{ $objetivos->links() }}
@endsection