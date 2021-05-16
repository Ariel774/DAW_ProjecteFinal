@extends('layouts.dashboard')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary show-modal" data-toggle="modal" data-target="#ambitModal">
    Launch demo modal
</button>
  
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="ambitModal" tabindex="-1" role="dialog" aria-labelledby="ambitModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h2 class="modal-title text-primary" id="ambitModalLabel">Confirmar Àmbits</h2>
    </div>
    <div class="modal-body">
        <!-- Contingut del Modal -->
        <form action="{{ route('dashboard.ambitos.store') }}" method="post" novalidate>
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
                                        <input type="text" name='ambito_0' placeholder='Nom àmbit' class="form-control"/>
                                    <td>
                                        <textarea name="descripcion_0" placeholder="Descripció" class="form-control"></textarea>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name='ambito_1' placeholder='Nom àmbit' class="form-control"/>
                                    <td>
                                        <textarea name="descripcion_1" placeholder="Descripció" class="form-control"></textarea>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name='ambito_2' placeholder='Nom àmbit' class="form-control"/>
                                    <td>
                                        <textarea name="descripcion_2" placeholder="Descripció" class="form-control"></textarea>
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

<script src="{{ asset('js/ambitos/ambito.js') }}" defer></script>

@endsection