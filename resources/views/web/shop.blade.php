<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.components.head')
</head>
<div id="myDiv" style="z-index: 9000;"></div>

<body>
    @include('web.components.navbar')
    <!-- ##### Right Side Cart Area ##### -->
    @include('web.components.cart')
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    @include('web.components.sliderDinamicMin')
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 order-2 order-md-1">
                    <div class="shop_sidebar_area">
                        <!-- ##### Single Widget ##### --> 
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Categorias</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('web.categories', [
                                            'id' => $category->id
                                        ]) }}">{{ $category->category }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9 order-1 order-md-2">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>({{ count($products) }})</span> Cachorritos Disponibles</p>
                                    </div>
                                    <!-- Sorting -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @if (count($products))
                            @foreach ($products as $product)
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                @include('web.components.tarjetaProducto')
                            </div>
                            @endforeach
                            @else
                                <h3 class="p-1 ml-2">No hay productos en esta categoría!</h3>
                            @endif
                        </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->
    @include('web.components.social')

    <!-- ##### Footer Area Start ##### -->
    @include('web.components.footer')
    <!-- ##### Footer Area End ##### -->

    @include('web.components.scripts')

</body>

</html>