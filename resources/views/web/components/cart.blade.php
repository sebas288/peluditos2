   <div class="cart-bg-overlay"></div>
    <div class="right-side-cart-area">
        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="{{ asset("img/core-img/bag.svg") }}" alt=""> <span class="count">0</span></a>
        </div>
        <div class="cart-content d-flex">
            <input type="hidden" name="storage" value="{{ voyager::image("/") }}">
            <!-- Cart List Area -->
            <div class="cardListHTML">
                <div class="cart-list"></div>
            </div>
            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2 class="details-shop">Detalles de la Compra</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span class="subtotalF">$0</span></li>
                    {{-- <li><span>delivery:</span> <span>Free</span></li> --}}
                    <li><span>total:</span> <span class="totalF">$0</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="{{ route('web.checkout') }}" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>