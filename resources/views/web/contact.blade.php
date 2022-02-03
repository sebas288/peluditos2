<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.components.head')
</head>
<div id="myDiv" style="z-index: 9000;"></div>

<body>
    <!-- ##### Header Area Start ##### -->
    @include('web.components.navbar')
    <!-- ##### Header Area End ##### -->
    <!-- ##### Right Side Cart Area ##### -->
    @include('web.components.cart')
    <!-- ##### Right Side Cart End ##### -->
    <div class="contact-area d-flex align-items-center">
        <div class="google-map" class="p-0 m-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5984127143643!2d-75.55966878523041!3d6.316365495428738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442f1143f82c1f%3A0xfef37df9ce5e66a2!2sCl%2027B%20%2350a-32%2C%20Bello%2C%20Antioquia!5e0!3m2!1ses-419!2sco!4v1611431446218!5m2!1ses-419!2sco" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="contact-info">
            <h2>Como encontrarnos</h2>
            <p>¡Encontrar el cachorro perfecto no tiene por qué estar lleno de misterio o compromiso! La diferencia de Peluditos con Garritas significa que puede encontrar el cachorro adecuado con confianza y facilidad. Nos especializamos en las razas Yorshire y Shih Tzu, encuentra aquí toda nuestra información de contacto...</p>

            <div class="contact-address mt-50">
                <p><span>Dirección:</span> calle 27B 50A - 32 Bello, Antioquia</p>
                <p><span>Celular:</span> 3218174056</p>
                <p><a href="mailto:peluditoscongarritas@gmail.com.com">peluditoscongarritas@gmail.com.com</a></p>
            </div>
        </div>
    </div>
    @include('web.components.social')

    <!-- ##### Footer Area Start ##### -->
    @include('web.components.footer')
    <!-- ##### Footer Area End ##### -->
    @include('web.components.scripts')
</body>
</html> 