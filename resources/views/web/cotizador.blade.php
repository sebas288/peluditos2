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
                            <h5>Cotización personalizada</h5>
                        </div>
                        <form  id="send-quote" method="post" action="{{ route('quote.save') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Nombre Completo <span>*</span></label>
                                    <input name="name" type="text" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Correo Electrónico <span>*</span></label>
                                    <input name="email" type="email" class="form-control" id="email_address" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="phone">Celular <span>*</span></label>
                                    <input name="phone" type="number" class="form-control" id="phone" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="type_product">Tipo de producto <small> (Especifica el producto a cotizar)</small> <span>*</span></label>
                                    <input name="type_product" type="type_product" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">Descripción <span>*</span></label>
                                    <textarea name="description" id="descripcion" cols="30" rows="10" placeholder="Realiza una breve descripción de las dimensiones de tu producto (Ancho, Altura, Grosor, etc...)"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class="btn essence-btn btn-block mt-2 mt-md-3" type="submit">Solicitar la cotización</button>
                                </div>
                            </div>
                        </form>
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