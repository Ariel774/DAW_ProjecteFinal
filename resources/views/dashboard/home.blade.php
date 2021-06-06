@extends('layouts.dashboard')

@section('styles')
<link href="{{ asset('css/menu-ambit.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- Modal Boostrap -->
<div class="row mb-4">
    <div class="col-4">
        <a href="#" class="btn btn-outline-info show-modal font-weight-bold" data-toggle="modal" data-target="#ambitModal"></span> Crear Àmbits</a>
    </div>
    <div class="col-8">
        <h1 class="text-start">Menu Àmbits</h1>
    </div>
  </div>
<div class="modal fade bd-example-modal-lg" id="ambitModal" tabindex="-1" role="dialog" aria-labelledby="ambitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title text-primary" id="ambitModalLabel">Crear Àmbits</h2>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Contingut del Modal -->
            <form action="{{ route('dashboard.ambitos.store') }}" method="POST" novalidate>
                @csrf
                <input type="hidden" name="nRows" value="" id="nRows">
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
                                        <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ambitos as $ambito)
                                    <tr>
                                        <td>
                                            <input type="text" name="ambitos[]" value="{{ $ambito->nombre }}" 
                                            placeholder='Nom àmbit' class="form-control @error('ambitos.{{$loop->index}}') is-invalid @enderror"
                                            {{ $loop->index < $ambitos->count() ? "readonly" : ''}}
                                            />
                                            @error('ambitos.{{$loop->index}}')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        <td>
                                            <textarea name="descripcion[]" placeholder="Descripció" 
                                            class="form-control @error('descripcion.{{$loop->index}}') is-invalid @enderror"
                                            {{ $loop->index < $ambitos->count() ? "readonly" : ''}}
                                            >{{ $ambito->descripcion}}
                                            </textarea>
                                            @error('descripcion.{{$loop->index}}')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </td>
                                        <td>
                                            @if($loop->index > $ambitos->count())
                                            <a class="deleteRow btn btn-danger d-block">X</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" style="text-align: left;">
                                            <input type="button" class="btn btn-primary btn-lg btn-block " id="addrow" value="Afegir Àmbit" />
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tfoot>
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
<div class="container mt-4">
<div class="row align-items-end">
    <div class='selector'>
        <ul>
            @foreach($ambitos as $ambito)
            <li>
                <a class="menuOption" href="{{ route('dashboard.ambitos.show', ['ambito' => $ambito->slug]) }}">
                    <p id="option-{{ $loop->index }}" class="text-uppercase">{{ $ambito->nombre}} </p>
                </a>
            </li>
            @php
            $nNumber = $loop->index;
            @endphp
            @endforeach
        </ul>
        <input type="hidden" value="{{ $nNumber }}" id="nOptions">
        <button style="font-family: 'Zen Dots', cursive;">ÀMBITS</button>
    </div>
</div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('js/menus/ambito-menu.js') }}" defer></script>
<script src="{{ asset('js/ambitos/ambito.js') }}" defer></script>

@endsection