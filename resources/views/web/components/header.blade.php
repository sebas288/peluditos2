<section class="welcome_area bg-img background-overlay" style="background-image: url({{ voyager::image($page->image) }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    <h5>Peluditos con Garritas</h5>
                    <h3>El mejor lugar para descubrir, <br> aprender y encontrar un cachorro</h3>
                    <a href="{{ url('/productos') }}" class="btn essence-btn">Ver todos los cachorros</a>
                </div>
            </div>
        </div>
    </div> 
</section>
<!-- ##### Welcome Area End ##### -->

<!-- ##### CTA Area Start ##### -->
<div class="cta-area" style="background-color: #FFF2E1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content bg-img background-overlay" style="background-image: url({{ voyager::image($company->bono_image) }});">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                            <h6>{{ $company->bono_discount }}</h6>
                            <h2>{{ $company->bono_title }}</h2>
                            <h5>{{ $company->bono_descripcion}}</h5>
                            <a href="{{ url('/productos') }}" class="btn essence-btn" style="background-color: #f168df;">Comprar</a>
                           {{--  <a href="#" class="btn essence-btn">Comprar Ahora</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>