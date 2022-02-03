<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.components.head')
</head>

<body>
    <!-- Nav Start -->
    @include('web.components.navbar')
    <!-- Nav End -->
    @include('web.components.cart')
    <!-- ##### Right Side Cart End ##### -->
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-10 mt-md-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Información de Facturación</h5>
                        </div>
                        <form  id="send-order">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Nombre Completo <span>*</span></label>
                                    <input name="name" type="text" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Correo Electrónico <span>*</span></label>
                                    <input name="email" type="email" class="form-control" id="email_address" value="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="documento">Tipo de documento <span>*</span></label>
                                    
                                    <select name="type_document" class="form-control w-100" required>
                                        <option value="">seleccione documento</option>
                                        <option value="cedula">cedula</option>
                                        <option value="cedula extranjeria">cedula extrajería</option>
                                        <option value="pasaporte">pasaporte</option>
                                        <option value="pep">pep</option>
                                        <option value="NIT">NIT</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="documento">Documento <span>*</span></label>
                                    <input name="document" type="text" class="form-control"  value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Número de Contacto <span>*</span></label>
                                    <input name="phone" type="number" class="form-control" id="phone_number" min="0" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Dirección <span>*</span></label>
                                    <input name="address" type="text" class="form-control mb-3" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Referencia <span>*</span></label>
                                    <input name="reference" type="text" class="form-control mb-3" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="neightborhood">Barrio <span>*</span></label>
                                    <input name="neightborhood" type="text" class="form-control mb-3"  value="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="documento">Tipo de pago <span>*</span></label>
                                    
                                    <select name="payment" class="form-control w-100" required>
                                        <option value="">seleccione tipo de pago</option>
                                        <option value="mp">Pago en línea</option>
                                        <option value="ce">Contra Entrega</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-4 mb-3">
                                    <label for="shipping">Configuración de envio <span>*</span></label>
                                    
                                    <select name="shipping-status" class="form-control w-100" required>
                                        <option value="si">Acceder a envío</option>
                                        <option value="no">Recoger en el punto</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class="btn essence-btn btn-block mt-2 mt-md-3" type="submit">Confirmar Orden</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Tu Orden</h5>
                            <p>Detalles</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            {{-- <li><span>Product</span> <span>Total</span></li>
                            <li><span>Cocktail Yellow dress</span> <span>$59.90</span></li> --}}
                            <li><span>Total</span> <span class="totalF">$0</span></li>
                            <li><span>Costo de envío</span> <span class="shipping">$0</span></li>
                            <li><span>Total + envío</span> <span class="totalWithShipping">$0</span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingFour">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><i class="fa fa-circle-o mr-3"></i>Condiciones y restricciones</a>
                                    </h6>
                                </div>
                                <div id="collapseFour" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Al llenar este formulario aceptaras los terminos y condiciones de peluditos con garritas para la comercialización y venta de nuestros productos, adicionalmente aceptaras la politica de tratamiento de datos personales con fines comerciales!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <a href="#" class="btn essence-btn">Place Order</a> --}}
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