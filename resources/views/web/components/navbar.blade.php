<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav" > 
            <!-- Logo -->
            <a class="nav-brand" href="{{ url('/')}}"><img src="{{ asset('img/core-img/logo.png') }}"alt=""></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn --> 
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li class="d-block d-md-none"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="d-block d-md-none"><a href="{{route('web.shop')}}">Productos</a></li>
                        <li><a href="{{route('web.shop')}}">Cachorros</a>
                            <div class="megamenu">
                                @foreach ($categories as $category)
                                <ul class="single-mega cn-col-4">
                                    <li class="title">{{ $category->category }}</li>
                                    @foreach ($category->products as $item)
                                        @if ($item->visibility != 'oculto')    
                                            <li><a href="{{ route('web.product', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                                @endforeach
                            </div>
                        </li> 
                        <li><a href="{{route('web.blog')}}">Quienes somos</a></li>
                        <li><a href="{{route('web.contact')}}">Contacto</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form action="{{ route('web.shop.search') }}" method="post">
                    @csrf
                    <input type="search" name="product" id="headerSearch" placeholder="Buscador...">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- Favourite Area -->
            <div class="favourite-area d-none">
                <a href="#"><img src="{{ asset('img/core-img/heart.svg') }}" alt=""></a>
            </div>
            <!-- User Login Info -->
            <div class="user-login-info">
                <a href="{{ url('/admin') }}" target="_blank"><img src="{{ asset('img/core-img/user.svg') }}" alt=""></a>
            </div>
            <!-- Cart Area -->
            <div class="cart-area">
                <a href="#" id="essenceCartBtn"><img src="{{ asset('img/core-img/bag.svg') }}" alt=""> <span class="count">0</span></a>
            </div>
        </div>

    </div>
</header>