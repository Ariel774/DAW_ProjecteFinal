@extends('layouts.dashboard')
@section('content')
<!-- Button trigger modal -->
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>CREAR ÀMBITS (Mínim 3)</h1>
        </div>
    </div>
    <button type="button" class="btn btn-primary btn-lg btn-block show-modal mb-4"  data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#ambitModal">
        CREAR ÀMBITS
    </button>
</div>
<!-- Modal -->
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
                                <tr>
                                    <td>
                                        <input type="text" name="ambitos[]" value="{{ old("ambitos.0") }}" placeholder='Nom àmbit' class="form-control @error('ambitos.0') is-invalid @enderror"/>
                                        @error('ambitos.0')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    <td>
                                        <textarea name="descripcion[]" placeholder="Descripció" class="form-control @error('descripcion.0') is-invalid @enderror">{{ old("descripcion.0") }}</textarea>
                                        @error('descripcion.0')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="ambitos[]" placeholder='Nom àmbit'  value="{{ old("ambitos.1") }}" class="form-control @error('ambitos.1') is-invalid @enderror"/>
                                        @error('ambitos.1')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    <td>
                                        <textarea name="descripcion[]" placeholder="Descripció" class="form-control @error('descripcion.1') is-invalid @enderror">{{ old("descripcion.1") }}</textarea>
                                        @error('descripcion.1')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="ambitos[]" placeholder='Nom àmbit' value="{{ old("ambitos.2") }}" class="form-control @error('ambitos.2') is-invalid @enderror"/>
                                        @error('ambitos.0')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    <td>
                                        <textarea name="descripcion[]" placeholder="Descripció" class="form-control @error('descripcion.2') is-invalid @enderror">{{ old("descripcion.2") }}</textarea>
                                        @error('descripcion.2')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td></td>
                                </tr>
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
<!-- Fi Modal -->
@endsection

@section('scripts')
<script src="{{ asset('js/ambitos/ambito-create.js') }}" defer></script>
@endsection