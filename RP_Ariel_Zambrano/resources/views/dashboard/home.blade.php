@extends('layouts.dashboard')

@section('styles')
<link href="{{ asset('css/menu-ambit.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- Modal Boostrap -->
<a href="#" class="btn btn-outline-info show-modal font-weight-bold" data-toggle="modal" data-target="#ambitModal"></span> Crear Àmbits</a>
<a href="#update-ambito" class="btn btn-outline-success font-weight-bold" id="update-ambitos"></span> Actualitzar Àmbits</a>
<div class="modal fade bd-example-modal-lg" id="ambitModal" tabindex="-1" role="dialog" aria-labelledby="ambitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title text-primary" id="ambitModalLabel">Crear Àmbits</h2>
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
                                    @php
                                    $number = $loop->index;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="text" name='ambito_{{ $loop->index }}' placeholder='Nom àmbit' class="form-control" value="{{ $ambito->nombre}}"/>
                                        <td>
                                            <textarea name="descripcion_{{ $loop->index }}" placeholder="Descripció" class="form-control">{{ $ambito->descripcion}}</textarea>
                                        </td>
                                        <td>
                                            @if($number > $ambitos->count())
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
                    <button type="submit" class="btn btn-primary">Guardar Àmbits</button>
                </div>
            </form>
        <!-- Fi del contingut del modal -->
        </div>
        </div>
    </div>
    </div>
<!-- Fi Modal Boostrap -->
<div class="container">
    <h1 align="center" class="mt-3">Menu Àmbits</h1>
<div class='selector'>
    <ul>
        @foreach($ambitos as $ambito)
        <li>
            <a class="menuOption" href="http://hola.com">
                <p id="option-{{ $loop->index }}" class="text-uppercase">{{ $ambito->nombre}} </p>
            </a>
        </li>
        @php
        $nNumber = $loop->index;
        @endphp
        @endforeach
    </ul>
    <input type="hidden" value="{{ $nNumber }}" id="nOptions">
    <button>Àmbits</button>
</div>
</div>
<!-- Tabla menu actualizar -->
<div id="options-ambitos" class="container" style="display: none">
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
                    @php
                    $number = $loop->index;
                    @endphp
                    <tr>
                        <td>
                            <input type="text" name='ambito_{{ $loop->index }}' placeholder='Nom àmbit' class="form-control" value="{{ $ambito->nombre}}"/>
                        <td>
                            <textarea name="descripcion_{{ $loop->index }}" placeholder="Descripció" class="form-control">{{ $ambito->descripcion}}</textarea>
                        </td>
                        <td>
                            @if($number > 2)
                            <eliminar-ambito ambito-id={{ $ambito->id }}></eliminar-ambito> {{-- Componente Vue --}}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<a id="update-ambito"></a>
<!--  Fin Tabla menu actualizar -->

@endsection

@section('scripts')
<script src="{{ asset('js/menus/ambito-menu.js') }}" defer></script>
<script src="{{ asset('js/ambitos/ambito.js') }}" defer></script>

@endsection