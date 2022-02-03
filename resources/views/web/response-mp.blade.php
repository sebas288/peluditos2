<!DOCTYPE html>
<html lang="es">

<head>
    @include('web.components.head')
</head>
    @include('web.components.navbar')
<body>

    @include('web.components.cart')

    @php
        $fail = '';
    @endphp

    @switch($collection_status)
        @case('approved')
            @php
                $status = 'Transacción aprobada';
                $img = 'https://www.mapbazar.com/payment/success.gif';
            @endphp
            @break
        @case('in_process')
            @php
                $status = 'Transacción en Proceso';
                $img = 'https://i.gifer.com/HI9M.gif';
            @endphp
            @break
        @default
            @php
                $status = 'Error de transacción: ' . $collection_status ;
                $fail = '<div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span class="swal2-x-mark"> <span class="swal2-x-mark-line-left"></span> <span class="swal2-x-mark-line-right"></span> </span> </div>';
            @endphp
            
    @endswitch
        
    <div class="container m-5 pt-5">
        <div class="row">
            <div class="col-md 1"></div>
            <div class="col-md-4">
                <img src="{{ $img ?? '' }}" class="img-fluid" alt="">
                {!! $fail !!}
            </div>
            <div class="col-md-7">
                <p>Gracias por elegirnos, estamos muy contentos de ser tu provedor en esta compra y esperamos poder ayudarte en todo lo que necesites, a continuación te compartimos los detalles del estado de tu pago</p>
                <ul>
                    <li>
                        <strong>Id de la compra:</strong> {{ $prefernce_id }}
                    </li>
                    <li>
                        <strong>Estado de la compra:</strong> {{ $status}}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ##### Footer Area Start ##### -->
    @include('web.components.footer')
    <!-- ##### Footer Area End ##### -->
    @include('web.components.scripts')


</body> 

</html> 