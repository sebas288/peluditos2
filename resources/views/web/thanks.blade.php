<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.components.head')
    <style>
        #descripcion{
            width: 100%;
            border-color: #eaeaea;
            height: 140px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- Nav Start -->
    @include('web.components.navbar')
    <!-- Nav End -->
    @include('web.components.cart')
    <!-- ##### Right Side Cart End ##### -->
    <!-- ##### Breadcumb Area Start ##### -->
    @include('web.components.sliderDinamicMin')
    <!-- ##### Breadcumb Area End ##### -->
    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-md-8">
                    <div class="checkout_details_area mt-10 mt-md-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Gracias por cotizar!!!</h5>
                        </div>
                        <p>{{ $message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('web.components.footer')
    <!-- ##### Footer Area End ##### -->

    @include('web.components.scripts') 

</body>

</html>