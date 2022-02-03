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

    @include('web.components.sliderDinamicMin')

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)    
                    <!-- Single Blog Area -->
                    <div class="col-12 col-lg-4">
                        <div class="single-blog-area mb-50" style="height: 300px;">
                            <img src="{{ voyager::image($post->image) }}" alt="">
                            <!-- Post Title -->
                            
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Post Title -->
                                <div class="hover-post-title">
                                    <a href="{{ route('blog.detail', ['slug' => $post->slug]) }}" style="color: #fff">{{ $post->title }}</a>
                                </div>
                                <a href="{{ route('blog.detail', ['slug' => $post->slug]) }}" class="d-none">Continuar leyendo <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->
    @include('web.components.social')

    <!-- ##### Footer Area Start ##### -->
    @include('web.components.footer')
    <!-- ##### Footer Area End ##### -->

    @include('web.components.scripts')

</body>

</html>
