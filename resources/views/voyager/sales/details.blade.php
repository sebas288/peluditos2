@extends('voyager::master')
<style>
    .img-fluid{
        width: 70px;
    }
</style>

@section('content')

<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="card-body">
                       <h4>Detalles de la venta</h4>
                       <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="">
                                Cliente: {{ $sale->client->name }} <br>
                                Tipo de documento: {{ $sale->client->type_document }} <br>
                                Documento: {{ $sale->client->document }} <br>
                                Celular: {{ $sale->client->phone }} <br>
                                Correo: {{ $sale->client->email }} <br>
                                Direccion: {{ $sale->client->address }} <br> 
                                Referencia: {{ $sale->client->reference }} <br>
                                Barrio: {{ $sale->client->neightborhood }} <br>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $item)
                                    <tr>
                                        <td style="width: 70px;">
                                            <img src="{{ voyager::image($item->product->imagen) }}" class="img-fluid" alt="">
                                        </td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>${{ number_format($item->product->price, 0) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->product->descripcion }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="1">Total</td>
                                        <td colspan="4" class="text-center">${{ number_format($sale->valor, 0) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                       
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
