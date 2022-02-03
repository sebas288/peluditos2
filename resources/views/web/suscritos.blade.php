<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.components.head')
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    @include('web.components.navbar')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    @include('web.components.cart')
    <!-- ##### Right Side Cart End ##### -->

    @include('web.components.sliderDinamicMin')

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="blog-wrapper mb-5">
        <div class="container">
            <div class="row justify-content-center">
               <div class="col-8">
                    @if (session('success') || session('alert'))
                        <div class="alert alert-success"> 
                            {{session('success') ?? session('alert')}} 
                        </div>
                    @else
                        <p class="mt-5">
                            Gracias por tu compra, es necesario que sepas que para la entrega de tus productos uno de nuestros agentes se pondra en contacto, de esta manera poddremos cordinar, el medio de envio, la forma de pago y las condiciones y garantías del mismo...
                        </p>
                    @endif
                </div>               
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('web.components.footer')
    <!-- ##### Footer Area End ##### -->

    @include('web.components.scripts')

</body>

</html>