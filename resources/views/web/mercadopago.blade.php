<!DOCTYPE html>
<html lang="es">

<head>
    @include('web.components.head')
</head>
    @include('web.components.navbar')
<body>

    @include('web.components.cart')
        
    <div class="container-fluid m-5 mt-0 pt-5 mx-auto">

        <div class="d-flex justify-content-center align-items-center mb-3 waiting-for-pay">
            <img src="{{ asset('images/waiting-for-pay.gif') }}" alt="waiting-for-pay">
        </div>
        <form action="{{ route('web.procesar') }}" method="POST" class="form-mercadopago">
            <script
            src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js"
            data-preference-id="{{ $refernce_id }}" data-button-label="Pagar ahora">
            </script>
        </form>
    </div>

    <!-- ##### Footer Area Start ##### -->
    @include('web.components.footer')
    <!-- ##### Footer Area End ##### -->
    @include('web.components.scripts')


</body> 

</html> 