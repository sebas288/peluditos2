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

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <input type="hidden" name="storage" value="{{ voyager::image("/") }}">

        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="{{ voyager::image($product->imagen) }}" alt="">
                <img src="{{ voyager::image($product->imagen2) }}" alt="">
                <img src="{{ voyager::image($product->imagen3) }}" alt="">
                <img src="{{ voyager::image($product->imagen4) }}" alt="">
                <img src="{{ voyager::image($product->imagen5) }}" alt="">
                {{-- <img src="{{ voyager::image($product->imagen2) }}" alt=""> --}}
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span>Producto</span>
            <a href="#">
                <h2>{{ $product->name }}</h2>
            </a>
            <p class="product-price price-Macho d-block">${{ number_format($product->price,0) }}</p>
            <p class="product-price price-Hembra d-none">${{ number_format($product->price2,0) }}</p>

            <p class="product-desc">{!!  $product->descripcion !!}</p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <div class="select-box d-block mt-50 mb-30">
                    <small>Cantidad:</small>
                    <input class="form-control" style="width: 40%; height: 55px;" type="number" value="1" min="1" minlength="1" name="qty">
                </div>
                <div>
                    <select name="sex" id="sex" class="change-sex">
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center" style="position: relative;top: 70px;left: -220px;">
                    <!-- Cart -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn addCart Macho"
                    data-id="{{ $product->id }}"
                    data-imagen="{{ $product->imagen }}"
                    data-producto="{{ $product->name }}"
                    data-precio="{{ $product->price }}"
                    data-envio="{{ $product->shipping }}"
                    data-descripcion="{{ $product->descripcion }}"
                    >Comprar</button>
                    <!-- Select Sex -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn addCart Hembra d-none"
                    data-id="{{ $product->id }}"
                    data-imagen="{{ $product->imagen }}"
                    data-producto="{{ $product->name }}"
                    data-precio="{{ $product->price2 }}"
                    data-envio="{{ $product->shipping }}"
                    data-descripcion="{{ $product->descripcion }}"
                    >Comprar</button>
                    <!-- Favourite -->
                    <div class="product-favourite ml-4 d-none">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('web.components.footer')
    <!-- ##### Footer Area End ##### -->

    @include('web.components.scripts')
    <script>
        $(function(){


            $(".change-sex").change(function (e) { 
                e.preventDefault();
                var sex = $(this).val();
            setSex(sex);
            });

            function setSex(sex){
                var sexo = sex;
                if (sexo==="Macho") {
                    $(".Macho").removeClass("d-none");
                    $(".Macho").addClass("d-block");
                    $(".Hembra").removeClass("d-block");
                    $(".Hembra").addClass("d-none");
                    /* validate price */
                    $(".price-Macho").removeClass("d-none");
                    $(".price-Macho").addClass("d-block");
                    $(".price-Hembra").removeClass("d-block");
                    $(".price-Hembra").addClass("d-none");
                    


                } else {
                    $(".Macho").removeClass("d-block");
                    $(".Macho").addClass("d-none");
                    $(".Hembra").removeClass("d-none");
                    $(".Hembra").addClass("d-block");
                    /* validate price */
                    $(".price-Hembra").removeClass("d-none");
                    $(".price-Hembra").addClass("d-block");
                    $(".price-Macho").removeClass("d-block");
                    $(".price-Macho").addClass("d-none");

                    
                }

            }

        })
    </script>

</body>

</html>