    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>

    <script>
        $(function(){

            var url = window.location

            $('.privacy_policy, .ociones_pago, .condiciones_entrega, .politica_privacidad, .terminos_condiciones').click(function (e) { 
                e.preventDefault();
                $('#privacy_policy').modal('show');

                $('.ociones-pago').hide();
                $('.politica-privacidad').hide();
                $('.condiciones-entrega').hide();
                $('.terminos-condiciones').hide();

                var op = $('.ociones-pago').text()

                var clase = $(this).attr('class')

                switch (clase) {
                    case 'politica_privacidad':
                        clase = '.politica-privacidad'
                        break;
                    case 'ociones_pago':
                        clase = '.ociones-pago'
                        break;
                    case 'condiciones_entrega':
                        clase = '.condiciones-entrega'
                        break;
                    case 'terminos_condiciones':
                        clase = '.terminos-condiciones'
                        break;
                
                    default:
                        break;
                }

                $(clase).show();
                console.log(clase);

            });



/*             $('.detail-product').click(function (e) { 
                e.preventDefault();
                var id = $(this).data('id')

                var urlQuery = String(url)
                var route = ''
                if (window.location.origin == 'http://localhost:8000') {
                    route = 'http://localhost:8000/'
                } else {
                    route = 'https://estirandolineas.com/'
                }
                location.href = route+'producto/'+id
            }); */
        })
    </script>

    <script src="{{ asset('js/loadingoverlay.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>


    <script src="{{ asset('js/carrito.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- Classy Nav js -->
    <script src="{{ asset('js/classy-nav.min.js') }}"></script>
    <!-- Active js -->
    <script src="{{asset('js/active.js')}}"></script>
    <script src="{{asset('js/floating-wpp.min.js') }}"></script>
    <script>
        $(function(){
            //setTimeout(function(){ $('.floating-wpp-popup').addClass('active'); }, 9000);
            $('#myDiv').floatingWhatsApp({
                phone: '573218174056',
                popupMessage: 'Hola, ¿en que podemos ayudarte?',
                showPopup: true
            });
        });
    </script> 


    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="{{ asset('js/map-active.js') }}"></script> --}}
