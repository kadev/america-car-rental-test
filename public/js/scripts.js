$( document ).ready(function() {

    /************/
    /* BUTTONS */
    let addCarBtn = $(".add-car");
    let addProductBtn = $(".add-extra");
    let deleteProductBtn = $(".delete-extra");
    let emptyCart = $(".empty-cart");
    let cart = $("#cart");

    /************/
    /* MODALS */
    let emptyCartConfirmationModal = $('#empty-cart-confirmation-modal');
    let shoppingCartModal = $('#shoppint-cart-modal');

    /***************/
    /* CONTAINERS */
    let extrasContainer = $("#extras-container");

    /************/
    /* ACTIONS */

    /*
     * Función para agregar un auto al carrito de compras
     */
    addCarBtn.on("click", function(){
        let $this = $(this);
        let car = $this.attr("data-car");
        let image = $this.attr("data-image");
        let price = $this.attr("data-price");

        $.ajax({
            method: 'POST',
            url: appURL+'cars/addProductToShoppingCar',
            data: { product: car, image: image, price: price, qty: 1 },
            beforeSend: function(){
                blockUISection("#available-cars", "Guardando extra, espera por favor...");
            }
        })
            .done(function( data ) {
                var result = JSON.parse(data);

                if(result.response == true){
                    window.location.href = appURL+'cars/reserve/'+car;
                }else{
                    alert("Oops... Something went wrong.")
                }

                unblockUISection("#available-cars");
                updateShoppingCart();
            });
    });

    /*
     * Función para agregar productos al carrito (Autos y extras)
     */
    addProductBtn.on("click", function(){
        let $this = $(this);
        let extra = $this.attr("data-extra");
        let image = $this.attr("data-image");
        let price = $this.attr("data-price");
        let input = $this.attr("data-input");
        let qty = $("input[name=" + input +"]");

        $.ajax({
            method: 'POST',
            url: appURL+'cars/addProductToShoppingCar',
            data: { product: extra, image: image, price: price, qty: qty.val() },
            beforeSend: function(){
                blockUISection("#extras-container", "Guardando extra, espera por favor...");
            }
        })
            .done(function( data ) {
                var result = JSON.parse(data);

                if(result.response == true){
                    $this.parent().find(".delete-extra").show();
                    $this.hide();
                    $this.parent().parent().find(".decrease-qty").addClass("disabled");
                    $this.parent().parent().find(".increase-qty").addClass("disabled");

                }else{
                    alert("Oops... Something went wrong.")
                }

                unblockUISection("#extras-container");
                updateShoppingCart();
            });
    });

    /*
     * Función para eliminar un producto del carrito de compras.
     */
    deleteProductBtn.on("click", function(){
        let $this = $(this);
        let extra = $this.attr("data-extra");

        $.ajax({
            method: 'POST',
            url: appURL+'cars/deleteExtraToShoppingCar',
            data: { product: extra },
            beforeSend: function(){
                blockUISection("#extras-container", "Eliminando extra, espera por favor...");
            }
        })
            .done(function( data ) {
                var result = JSON.parse(data);

                if(result.response == true){
                    $this.parent().find(".add-extra").show();
                    $this.hide();
                    $this.parent().parent().find(".decrease-qty").removeClass("disabled");
                    $this.parent().parent().find(".increase-qty").removeClass("disabled");
                }else{
                    alert("Oops... Something went wrong.")
                }

                unblockUISection("#extras-container");
                updateShoppingCart();
            });
    });


    /*
     * Función para vaciar el carrito de compras.
     */
    emptyCart.on("click", function() {
        emptyCartConfirmationModal.modal({
            onApprove : function() {
                $.ajax({
                    method: 'POST',
                    url: appURL+'cars/emptyCart',
                    data: { },
                    beforeSend: function(){
                        blockUISection("#content", "Eliminando extra, espera por favor...");
                    }
                })
                    .done(function( data ) {
                        var result = JSON.parse(data);

                        if(result.response == true){
                            window.location.href = appURL;
                        }else{
                            alert("Oops... Something went wrong.")
                        }

                        unblockUISection("#content");
                        updateShoppingCart();
                    });
            }
        }).modal('show');
    });

    /*
     * Función para activar/ocultar el menú en movil
     */
    $("#mb-menu, #close-sidebar").on("click", function () {
        $("#sidebar").toggleClass("active");
        $(".overlay").toggleClass("active");
        $("body").toggleClass("noscroll");
    });

    /*
     * Función para ocultar el menú en movil al dar click en overlay.
     */
    $("#dismiss, .overlay").on("click", function () {
        $("#sidebar").removeClass("active");
        $(".overlay").removeClass("active");
        $("body").removeClass("noscroll");
    });

    /*
     * Función para incrementar o disminuir la cantidad del producto extra.
     */
    extrasContainer.on( 'click', '.decrease-qty, .increase-qty', function() {
        // Get current quantity values
        let qty = $( this ).parent().find( 'input' );//.find( '.qty' );
        let val   = parseFloat(qty.val());
        let max = parseFloat(qty.attr( 'max' ));
        let min = parseFloat(qty.attr( 'min' ));
        let step = parseFloat(qty.attr( 'step' ));

        // Change the value if plus or minus
        if ( $( this ).is( '.increase-qty' ) ) {
            if ( max && ( max <= val ) ) {
                qty.val( max );
            } else {
                qty.val( val + step );
            }
        } else {
            if ( min && ( min >= val ) ) {
                qty.val( min );
            } else if ( val > 0 ) {
                qty.val( val - step );
            }
        }

        qty.change();
    });

    /*
     * Función para mostrar el carrito de compras.
     */
    cart.on("click", function(){
        shoppingCartModal.modal('show');
    });

    /*
     * Función para actualizar dinámicamente el carrito de compras cuando se agrega, eliminar o aumenta la cantidad de un producto.
     */
    function updateShoppingCart(){
        const container = $("#products-list");
        const cart = $("#cart").find(".qty-products");
        const totalCart = $("#total-cart");
        $.ajax({
            method: 'POST',
            url: appURL+'cars/updateShoppingCart',
            data: {  },
            beforeSend: function(){
                blockUISection("#shoppint-cart-modal", "Actualizando carrito, espera por favor...");
            }
        })
            .done(function( data ) {
                var result = JSON.parse(data);

                if(result.response == true){
                    container.html('');
                    container.html(result.htmlProducts);
                    totalCart.text('$'+result.total);
                    cart.text(result.items);

                    console.log(result.items);

                    if(result.items == 0){
                        window.location.href = appURL;
                    }
                }else{
                    alert("Oops... Something went wrong.")
                }

                unblockUISection("#shoppint-cart-modal")
            });
    }

    /*
     * Función para bloquear una sección
     */
    function blockUISection($section, $message = null){
        var container = $($section);
        if($message == null) $message = "Loading, please wait...";

        container.block({
            message: $message,
            overlayCSS: {
                backgroundColor: '#e9ecf6',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                color: '#000',
                padding: 0,
                backgroundColor: 'transparent'
            }
        });
    }

    /*
     * Función para desbloquear una sección
     */
    function unblockUISection($section){
        var container = $($section);
        container.unblock();
    }
})