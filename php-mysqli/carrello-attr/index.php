<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enesi - Negozio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>

        .wrapper {
            min-width: 320px;
        }

        .server-message {
            height: 70px;
        }

        h3 {
            background-color: green;
            color: white;
        }

        .disclaimer {
            background-color: lightgray;
            min-height: 70px;
            display: flex;
            align-items: center;
            line-height: 30px;
        }

        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button {  
            opacity: 1;
        }

        .grand-total {
            position: relative;
        }

        .grand-total::after {
            content: "";
            display: block;
            position: absolute;
            height: 2px;
            background-color: green;
            width: 150px;
            top: 0;
            right: 0;
        }

    </style>
</head>
<body>

        <div class="wrapper">
            <div class="server-message"></div>
            <div class="container">

                <!-- Shop: lista di prodotti -->
                <h3 class="py-1 px-3">Shop</h3>
                <div class="disclaimer px-3">Numero massimo di pezzi ordinabili per modello: 1000; <br>numero minimo: 1. </div>
                <div class="product-list"></div>

                <hr>

                <!-- Carrello -->
                <h3 class="py-1 px-3">Carrello</h3>
                <div class="cart mt-3"></div>
            
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            // variabile flag per visualizzare pulsante "svuota il carrello": se true, pulsante d-none
            let cartIsEmpty = true;

            // validazione input: quantità prodotti true e maggiore di 0
            function quantityValidation(value) {
                value = parseInt(value);
                return !value || value <= 0;
            }

            // aggiorna database quando la quantità viene cambiata
            function updateDatabase(e) {

                let $element = $(this).parents("form");
                let newProductQuantity = $element.find(".product-quantity").val();
                let cartItemId = $element.find(".cart-item-id").val();
                let productPrice = $element.find(".product-price").val();
                let productCode = $element.find(".product-code").val();

                $.ajax({
                    url: "./server.php",
                    method: "post",
                    data: {
                        changeProductQuantity: true,
                        productQuantity: newProductQuantity,
                        cartItemId: cartItemId,
                        productPrice: productPrice,
                        productCode: productCode,
                    },
                    success: res => updateCart(),
                    error: err => console.error(err),
                })
            };

            // elimina elemento singolo dal carrello            
            function deleteSingleElement(e) {
                e.preventDefault();

                $(".cart").children().length > 2 ? cartIsEmpty = false : cartIsEmpty = true;

                // dati del prodotto da eliminare
                let cartItemId = $(this).parents("form").find(".cart-item-id").val();

                $.ajax({
                    url: "./server.php",
                    method: "post",
                    data: {
                        delete: true,
                        id: cartItemId,
                    },
                    success: res => updateCart(),
                    error: err => console.error(err),
                });                
            }

            // SHOP: invio prodotto selezionato al server
            function addToCart(e) {
                e.preventDefault();
                
                cartIsEmpty = false;

                let productId = $(this).parent().find(".product-id").val();
                let productName = $(this).parent().find(".product-name").val();
                let productCode = $(this).parent().find(".product-code").val();
                let productPrice = $(this).parent().find(".product-price").val();
                let productQuantity = $(this).parent().find(".product-quantity").val();

                // validazione input
                if(quantityValidation(productQuantity)) {
                    $(this).parent().find(".product-quantity").css("outline", "2px solid red");
                } else {
                    // azzera eventuale segnalazione di errore
                    $(this).parent().find(".product-quantity").css("outline", "none");

                    // riporta quantità del prodotto a 1
                    $(this).parent().find(".product-quantity").val(1);
    
                    $.ajax({
                        url: "server.php",
                        method: "post",
                        data: {
                            productId: productId,
                            productName: productName,
                            productCode: productCode,
                            productPrice: productPrice,
                            productQuantity: productQuantity,
                        },
                        success: res => {
                            $(".server-message").html(res);
                            
                            // aggiorna carrello ogni volta che aggiungi prodotto
                            updateCart();
                        },
                        error: err => console.error(err),
                    });
                }
            }

            // svuotare il carrello
            function emptyCart() {
                cartIsEmpty = true;

                $.ajax({
                    url: "./server.php",
                    method: "post",
                    data: {
                        clear: "all",
                    },
                    success: res => updateCart(),
                    error: err => console.error(err),
                })
            }

            // chiamata ajax per aggiornare carrello
            function updateCart() {
                
                $.ajax({
                    url: "./api/endpoint-cart.php",
                    method: "get",
                    success: res => {

                        // impostazione cartIsEmpty
                        cartIsEmpty = res[0] && res[0].length > 0 ? cartIsEmpty = false : cartIsEmpty = true

                        let content = "";

                        if(res.length > 0) {

                            res[0].forEach(product => content += `
                                <div class="cart-item row mt-3 ps-3">
                                    <div class="col-12 col-lg-4">
                                        <h4>${product.product_name}</h4>
                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <div class="row">
                                            <div class="col-12 col-md-8">
                                                <form action="#">
                                                    <input type="hidden" class="cart-item-id" name="cart_item_id" value="${product.id}">
                                                    <input type="hidden" class="product-code" name="product_code" value="${product.product_code}">
                                                    <input type="hidden" class="product-price" name="product-price" value="${product.product_price}">
                                                    <div class="row row">                                                  
                                                        <div class="quantity-container col-6">
                                                            <input type="number" class="product-quantity form-control" name="product_quantity" value="${product.qty}" min="1" max="1000">
                                                        </div>
                                                        <div class="col-6">
                                                            <button class="deleteItem-btn btn btn-warning" type="submit">cancella</button>                                            
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="cart-item-total-price col-12 text-start col-md-4 text-md-end">${product.total_price}€</div>
                                        </div>
                                    </div>                                    
                                </div>
                            `);    
                        }
                        
                        // spesa totale
                        content += `
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="${cartIsEmpty ? 'd-none' : 'col-6'}">
                                        <button class="empty-cart-btn btn btn-danger">Svuota il carrello</button>
                                    </div>
                                    <div class="${cartIsEmpty ? 'offset-6' : 'offset-0'} col-6 text-end grand-total pt-3 pe-0">
                                        Totale: ${res[1]}€                                
                                    </div>
                                </div>
                            </div>
                        `;

                        let grandTotal = $(".cart").find(".cart-item-total-price");

                        // bloccare invio dati alla pressione di enter nel carrello
                        $( ".cart" ).keydown(function(e) {
                            if(event.keyCode == 13) {
                                event.preventDefault();
                            }
                        });

                        $(".cart").html(content);

                        // elimina elemento singolo dal carrello
                        $(".deleteItem-btn").click( deleteSingleElement );

                        // aggiorna database quando la quantità viene cambiata
                        $(".cart .product-quantity").change( updateDatabase );

                        // svuota il carrello
                        $(".empty-cart-btn").click( emptyCart );

                    },
                    error: err => console.error(err),
                })
            }

            // visualizzazione prodotti
            function updateShop() {
                $.ajax({
                    url: "./api/endpoint-productList.php",
                    method: "get",
                    success: res => {
                        let content = "";

                        res.forEach(product => content += `
                            <div class="product-item row mt-3 ps-3">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <h4 class="product-item-title">${product.product_name}</h4>
                                </div>
                                <div class="product-item-price col-12 col-sm-6 text-sm-end text-lg-start col-lg-3">Prezzo per unità: ${product.product_price}€</div>
                                
                                <!-- form per inviare prodotto a carrello -->
                                <div class="shop-controls col-12 offset-sm-6 col-sm-6 offset-lg-0 col-lg-6 d-sm-flex justify-content-end">
                                    <form action="#" class="form-submit">
                                        <input type="number" class="product-quantity" name="product_quantity" value="1" min="1" max="1000">
                                        
                                        <!-- input nascosti: compilazione tabella cart -->
                                        <input type="hidden" class="product-id" name="product_id" value="${product.id}">
                                        <input type="hidden" class="product-name" name="product_name" value="${product.product_name}">
                                        <input type="hidden" class="product-code" name="product_code" value="${product.product_code}">
                                        <input type="hidden" class="product-price" name="product_price" value="${product.product_price}">
                                        <input type="submit" class="addProduct-btn" value="Aggiungi prodotto">
                                    </form>
                                </div>
                            </div>
                        `);
                        
                        $(".product-list").html(content);

                        // SHOP: invio prodotto selezionato al server
                        $(".addProduct-btn").click( addToCart );
                    },
                    error: err => console.error(err),
                })
            }
            
            // SHOP: aggiorna shop all'avvio
            updateShop();

            // CARRELLO: aggiorna carrello all'avvio
            updateCart();

        })

    </script>
</body>
</html>