@extends('voyager::master')
<style>
    .btn.btn-primary{
        text-decoration: none;
        color: red;
    }
</style>

@section('content')

<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="card-body table-responsive">
                        <table class="table table-hover" id="quotes">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>pref_id</th>
                                    <th>cliente</th>
                                    <th>Total</th>
                                    <th>Forma de pago</th>
                                    <th>Estado Pago</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->id }}</td>
                                        <td>{{ $sale->preference_id }}</td>
                                        <td>{{ $sale->client->name }}</td>
                                        <td>{{ $sale->valor }}</td>
                                        <td>
                                            @if ($sale->forma_pago == 'mp')
                                                Mercado Pago
                                            @else
                                                {{ $sale->forma_pago }}
                                            @endif
                                        </td>
                                        <td>
                                            @switch($sale->estado_pago)
                                                @case('approved')
                                                    Aprobado
                                                    @break
                                                @case('pendiente')
                                                    Pendiente
                                                    @break
                                                @case('in_process')
                                                    Pendiente
                                                    @break
                                                @case('rejected')
                                                    Rechazado
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td>{{ $sale->created_at }}</td>
                                        <td>
                                            <a href="{{ route('sales.details', [
                                                'id' => $sale->id
                                            ]) }}" class="btn btn-primary btn-detail">Detalles</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    
    $(document).ready( function () {

        //$('#quotes').DataTable().destroy();
        $("#quotes").dataTable().fnDestroy();

        setTimeout(function(){
            datatables()
        }, 200);
        
        function datatables(){
            $('#quotes').DataTable({
                "bDestroy": true,
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "pageLength": 50,
                "bDestroy": true,
                "order": [[ 0, "desc" ]]
            });
        }

    } );

</script>

<script>
        
    function copiarAlPortapapeles(id_elemento) {
        var url = '{{ url('/') }}';
        var aux = document.createElement("input");
        aux.setAttribute("value", url + '/cotizaciones/' + document.getElementById(id_elemento).id);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
</script>
