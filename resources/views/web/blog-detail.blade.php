<!DOCTYPE html>
<html lang="es">

<head>
    @include('web.components.head')
</head>
<body>
    @include('web.components.navbar')
    {{-- @include('web.components.header') --}}
    <!-- Cart List Area -->
    @include('web.components.cart')
    <!-- Cart List Area -->      

    <div class="container p-5">
        <h2>{{ $post->title }}</h2> <hr>
        <p class="">
            {!! $post->body !!}
        </p>
        <img src="{{ voyager::image($post->image) }}" class="img-fluid img-responsive" alt="">
        {{-- <a href={{ route('web.about') }} class="btn essence-btn">Ver Más</a> --}}
    </div>

    @include('web.components.footer')

    @include('web.components.scripts')

</body> 

</html> 