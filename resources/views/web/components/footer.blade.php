<div class="container-fluid prefooter" ></div>
<footer class="footer_area clearfix">
    <div class="container">
        <div class="row">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area d-flex mb-30">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="#"><img src="{{ voyager::image($company->icono) }}" class="img-fluid" alt=""></a>
                    </div>
                    <!-- Footer Menu -->
                    <div class="footer_menu">
                        <ul>
                        <li><a href="{{route('web.shop')}}">Compras</a></li>
                            <li><a href="{{route('web.blog')}}">Blog</a></li>
                            <li><a href="{{route('web.contact')}}">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area mb-30">
                    <ul class="footer_widget_menu">
                        <li><a href="#" class="ociones_pago">Opciones de pago</a></li>
                        <li><a href="#" class="condiciones_entrega">Condiciones de entrega</a></li>
                        <li><a href="#" class="politica_privacidad">Politica de privacidad</a></li>
                        <li><a href="#" class="terminos_condiciones">Terminos y condiciones</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row align-items-end">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_heading mb-30">
                        <h6>Suscribete</h6>
                    </div>
                    <div class="subscribtion_form">
                        <form action="{{ route('suscribe.save') }}" method="post">
                            @csrf
                            <input style="color: #fff; font-size: 15px;" type="email" name="email" class="mail" placeholder="Tu correo electronico">
                            <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_social_area">
                        <a href="{{ $company->facebook }}" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="{{ $company->instagram }}" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=+57{{ $company->phone }}}}x&text=%C2%A1Hola" data-toggle="tooltip" data-placement="top" title="WhatsApp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

<div class="row mt-5">
            <div class="col-md-12 text-center">
                <p style="color:#fff">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Hecho con amor <i class="fa fa-heart-o" aria-hidden="true"></i> por <br class="d-block d-md-none"> <a href="https://somoscreandola.com" class="creandola" target="_blank">Somos Creándola</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>

    </div>
</footer>

<!-- Modal privacy policy -->
<div class="modal fade" id="privacy_policy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Políticas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <div class="ociones-pago">
                {!! $company->opciones_pago !!}
            </div>
            <div class="politica-privacidad">
                {!! $company->politica_privacidad !!}
            </div>
            <div class="condiciones-entrega">
                {!! $company->condiciones_entrega !!}
            </div>
            <div class="terminos-condiciones">
                {!! $company->terminos_condiciones !!}
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar ventana</button>
        </div>
      </div>
    </div>
  </div>