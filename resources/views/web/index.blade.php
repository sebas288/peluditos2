<!DOCTYPE html>
<html lang="es">

<head>
    @include('web.components.head')
    <div id="myDiv" style="z-index: 9000;"></div>
    @include('web.components.header')
</head>
    @include('web.components.navbar')
<body>
    <!-- Cart List Area -->
    @include('web.components.cart')
    <!-- Cart List Area -->  
    

    <!-- ##### New Arrivals Area Start ##### -->
    @include('web.components.popularProducts')
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    {{-- @include('web.components.allies') --}}
    @include('web.components.social')
    <!-- ##### Brands Area End ##### -->
    @include('web.components.clients')

    @include('web.components.puppies')
    

    <!-- ##### Footer Area Start ##### -->
    @include('web.components.footer')
    <!-- ##### Footer Area End ##### -->
    

    @include('web.components.scripts')


</body> 

</html> 