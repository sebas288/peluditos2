<div class="single-product-wrapper">
    <!-- Product Image -->
    <div class="product-img">
        <img src="{{ voyager::image($product->imagen) }}" class="detail-product" data-id='{{ $product->id }}' alt="">
        <!-- Hover Thumb -->
        <img class="hover-img detail-product" data-id='{{ $product->id }}' src="{{ voyager::image($product->imagen2) }}" alt="">
    </div>

    <!-- Product Description -->
    <div class="product-description">
        <span>Producto:</span>
        <a href="{{ route('web.product', ['id' => $product->id]) }}">
            <h6>{{ $product->name }}</h6>
        </a>
        <p class="product-price" style="color: #007bff; font-size:20px;">
            {{-- <span class="old-price">${{ number_format($product->price, 0) }}</span>  --}}
            ${{ number_format($product->price, 0) }}
        </p>

        <!-- Hover Content -->
        <div class="hover-content">
            <a href="{{ url('/producto/'.$product->id) }}" class="btn essence-btn">Ver más</a>

            <!-- Add to Cart -->
            {{-- <div class="add-to-cart-btn">
                <a href="#" class="btn essence-btn addCart"
                    data-id="{{ $product->id }}"
                    data-imagen="{{ $product->imagen }}"
                    data-producto="{{ $product->name }}"
                    data-precio="{{ $product->price }}"
                    data-envio="{{ $product->shipping }}"
                    data-descripcion="{{ $product->descripcion }}"
                >Agregar al Carrito</a>
            </div> --}}
        </div>
    </div>
</div> 