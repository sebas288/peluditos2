$(function(){
    /* localStorage.clear(); */
    const url = window.location.href;
    
    //Crea la instancia de sweet alert 2
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    //añadir al carrito-------------------------------------------------------------------------
    $('.addCart').click(function (e) { 
        e.preventDefault();

        var item = {}

        item.productId = $(this).data('id')
        item.productImage = $(this).data('imagen')
        item.productName = $(this).data('producto')
        item.productPrice = $(this).data('precio')
        item.productShipping = $(this).data('envio')
        item.productDescription = $(this).data('descripcion')
        item.message = 'Añadido al carrito'
        item.icon = 'success'
        item.productQuantity = $('input[name=qty]').val() ? $('input[name=qty]').val() : 1
        item.sex = $('select').val()

        setCart(item);

 
    });

    function setCart(item){
        var paquete = []

        if (localStorage.getItem("carrito")) {
            paquete = JSON.parse([localStorage.getItem("carrito")])

            paquete = paquete.filter(function(current){
                return current.productId !== item.productId
            })
            paquete.push(item)
            localStorage.setItem("carrito", JSON.stringify(paquete));
        }else{
            paquete.push(item)
            localStorage.setItem("carrito", JSON.stringify(paquete));
        }

        Toast.fire({
                    icon: item.icon,
                    title: item.message,
                    position: 'top-center'
                })
        counterCart();
        $('#essenceCartBtn').click();
        existCart(true);

        
    }

    function counterCart(){
        if (localStorage.getItem("carrito")) {
           var items = JSON.parse([localStorage.getItem("carrito")])
           $('.count').html(items.length)
        }else{
            $('.count').html(0)
        }
        /* calculoInicial() */
    }
    counterCart()

        //carrito de compras, lista de elementos seleccionados
        existCart(false)
        function existCart(booleano){
            if (localStorage.getItem("carrito") !== null) {
            window.localStorage
            
            var test = []
            test = JSON.parse([localStorage.getItem("carrito")])
    
                var cardList = ''
    
                if (test.length <= 0) {
                    $('.cardListHTML').html(`<h6 class="m-2">Vacio(0)</h6>`);
                    $('.count').html(0)
                    $('.totalF, .subtotalF').html(0) 
                    $('.totalWithShipping').html(0);
                    }else{
    
                    for(var i in test){
                        //console.log(test[i])
    
                        nameImage = test[i].productImage;
    
                        nameImage = nameImage.replace('\\', '/')
                        nameImage = nameImage.replace('\\', '/')
                        image = $('[name="storage"]').val()+nameImage;
                        
                        image = image.replace('peluditos//', 'peluditos/');

                        cardList += `
                        <div class="cart-list fila">
                            <!-- Single Cart Item -->
                            <div class="single-cart-item">
                                <a href="#" class="product-image">
                                    <img src="`+image+`" class="cart-thumb" alt="">
                                    <!-- Cart Item Desc -->
                                    <div class="cart-item-desc">
                                    <span class="product-remove borrar-tta" data-id='`+test[i].productId+`'><i class="fa fa-close " aria-hidden="true"></i></span>
                                        <span class="badge " style="color:white; font-size:14px;">`+test[i].productName+`</span>
                                        <p style="color:white; font-size:14px;">`+test[i].sex+`</p>
                                        
                                        <p class="size price" 
                                            data-qty='`+test[i].productQuantity+`'
                                            data-shipping='`+test[i].productShipping+`'
                                        >`+test[i].productPrice+`</p>
                                        <p class="qty d-none">Color: Red</p>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>`
                    }
    
                    $('.cardListHTML').html(cardList);
    
                }
    
            }else{
                console.log('no existe el carrito');
                $('.cardListHTML').html(`<td colspan="6">No hay elementos en el carrito</td>`);
            }
    
        
            $('.borrar-tta').click(function (e) { 
                e.preventDefault();
                var elemento = $(this).data('id')
                paquete = JSON.parse([localStorage.getItem("carrito")])
                
                paquete = paquete.filter(function(current){
                    return current.productId !== elemento
                })
    
                localStorage.setItem("carrito", JSON.stringify(paquete))
                JSON.parse(localStorage.getItem("carrito"))
                Toast.fire({
                        position: 'top-start',
                        icon: 'error',
                        title: 'Producto eliminado del carrito'
                    })    
                existCart(true);
                counterCart()                   
            });
    
            calculoInicial()
        }


        function calculoInicial(){
            var shippingTotal = 0
            $('.cardListHTML').find('.fila').each(function(){
                var precio = $(this).find('div a div p.price').html();
                var cantidad = $(this).find('div a div p.price').data('qty');
                var shipping = $(this).find('div a div p.price').data('shipping');

                if (cantidad > 1) {
                    shippingPercentage = shipping * 0.5
                    shipping = (shipping * 2) - shippingPercentage
                }

                shippingTotal += shipping
                var subtotal = cantidad * parseInt(precio);
    
                $(this).find('div a div p.qty').html(number_format(subtotal));
                $('.totalF, .subtotalF').html( '$ '+sumValues() );

                if ($('.shipping').length) {
                    $('.shipping').html( '$ '+number_format(shippingTotal) );
                }
            });

            if ($('.totalWithShipping').length) {
                var total = $('.totalF').html()               
                total = total.replace('$', '')
                for (let i = 0; i < total.length; i++) {
                    if (total[i] == ',') {
                        total = total.replace(',', '')
                    }
                }
                total = parseFloat(total);
                var totalMoreShipping = total + shippingTotal
                $('.totalWithShipping').html( '$ '+number_format(totalMoreShipping) );
            }
    
        }

        sumValues()
        function sumValues(){
            var suma = 0;
            $('.cardListHTML').find('.fila').each(function(){
                var dato = $(this).find('div a div p.price').html();
                var qty = $(this).find('div a div p.price').data('qty');
                dato = dato.replace('$', '')
                dato = dato.replace(',', '')
                dato = parseInt(dato);
                suma += dato * qty;
            });
            var nTotal = number_format(suma, 0); 
            return nTotal;
        }

        $('#send-order').on('submit', function(e){
            e.preventDefault();
            var persona = $(this).serializeObject();
             
            sendOrder(persona)
       });

       function sendOrder(persona){
        compra = JSON.parse([localStorage.carrito])
            
        var total = 0
        for(let i in compra){
            total += compra[i].productPrice * parseInt(compra[i].productQuantity)
        }
        
        var totalOrder = parseInt(total)
                        
        var box = {}
        box.cliente = persona

        var shippingStatus = $('select[name="shipping-status"]').val()
        if (shippingStatus == 'si') {
            var shippingPrice = $('.shipping').html( )
            shippingPrice = shippingPrice.replace('$', '')
            shippingPrice = shippingPrice.replace(',', '')
            shippingPrice = parseInt(shippingPrice);
            console.log(shippingPrice);
            box.total = totalOrder + shippingPrice
        }else{
            console.log('no');
            box.total = totalOrder 
        }
        
        box.compra = compra
        sendPackage(box)
   }

   function sendPackage(box){
        console.log(box)
        //return false;

        var urlHttp = url;
        var urlFinish = urlHttp.replace("/checkout", "");

        $.ajax({
            type: "post",
            url: urlFinish+"/order",
            data: {json: JSON.stringify(box)},
            dataType: "json",
            beforeSend: function(){
                $.LoadingOverlay("show", {
                    image       : "",
                    progress    : true,
                    background  : 'rgba(255, 255, 255, 0.8)'
                });
            },
            success: function (response) {
                console.log(response)
                var item = {
                    'icon': 'success',
                    'message':'Estamos trabajando para mejorar tu expereincia'
                }
                //Message(item)
                //$.LoadingOverlay("hide");
                var count     = 0;
                var interval  = setInterval(function(){
                    if (count >= 100) {
                        clearInterval(interval);
                        $.LoadingOverlay("hide");
                        //localStorage.clear()
                        if (response.payment == 'mp'){
                            window.location.href = './mercado-pago/'+ response.preference_id;
                        } else {
                            window.location.href = './gracias';
                        }
                       
                        return;
                    }
                    count += 10;
                    $.LoadingOverlay("progress", count);
                }, 200);
            }
        });
    }


        $.fn.serializeObject = function() {
            var obj = {};
            var arr = this.serializeArray();
            arr.forEach(function(item, index) {
            if (obj[item.name] === undefined) { // New
                obj[item.name] = item.value || '';
            } else {                            // Existing
                if (!obj[item.name].push) {
                    obj[item.name] = [obj[item.name]];
                }
                obj[item.name].push(item.value || '');
            }
            });
            return obj;
        };

        
        function number_format(amount, decimals) {
            amount += ''; // por si pasan un numero en vez de un string
            amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
    
            decimals = decimals || 0; // por si la variable no fue fue pasada
    
            // si no es un numero o es igual a cero retorno el mismo cero
            if (isNaN(amount) || amount === 0) 
                return parseFloat(0).toFixed(decimals);
    
            // si es mayor o menor que cero retorno el valor formateado como numero
            amount = '' + amount.toFixed(decimals);
    
            var amount_parts = amount.split('.'),
                regexp = /(\d+)(\d{3})/;
    
            while (regexp.test(amount_parts[0]))
                amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
    
            return amount_parts.join('.');
        }
    
    //Trigger mercadopago payment button
    const pay = $('.mercadopago-button');
    if (pay.length > 0){
        pay.click();
    } 

});

