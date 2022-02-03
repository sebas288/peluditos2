<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>PELUDITOS MÁS AMOROSOS</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    @foreach ($products as $product)     
                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img class="detail-product" src="{{ voyager::image($product->imagen) }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img detail-product"
                             src="{{ voyager::image($product->imagen2) }}" alt=""
                             data-id='{{ $product->id }}'
                            >
                            <!-- Favourite -->
                            <div class="product-favourite d-none">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>Cachorritos</span>
                            <a href="{{ route('web.product', ['id' => $product->id]) }}">
                                <h6>{{ $product->name }}</h6>
                            </a>
                            <p class="product-price" style="color: #007bff; font-size:20px;">${{ number_format($product->price) }}</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="{{ url('/producto/'.$product->id) }}" class="btn essence-btn">Ver más</a>
                                    {{-- <a href="#" class="btn essence-btn addCart"
                                        data-id="{{ $product->id }}"
                                        data-imagen="{{ $product->imagen }}"
                                        data-producto="{{ $product->name }}"
                                        data-precio="{{ $product->price }}"
                                        data-envio="{{ $product->shipping }}"
                                        data-descripcion="{{ $product->descripcion }}"
                                    >Agregar al Carrito</a> --}}
                                    {{-- <a href="#" class="btn essence-btn">Añadir al carrito</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>
</section>