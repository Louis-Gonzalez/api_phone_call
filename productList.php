<?php 

// soapProducts.php

// Création du ProductList SOAP
    // création d'un tableau d'options (uri, location)
    $options = [

        'location' => 'http://localhost/php_web_services2/soapServer.php',
        'uri' => 'http://localhost/php_web_services2/productList'
    ];

    // création du ProductList avec la classe PHP SoapProductList
    $productList = new SoapClient(null, $options);


    // Appel de la fonction du service avec la méthode __soapCall
    $result = $productList->__soapCall('getProducts', []);
    $result = $productList->__soapCall('getProductById', [4]);
    $result = $productList->__soapCall('addProduct', [
                                                        'marque' => 'plastick',
                                                        'model' => 'sac',
                                                        'description' => 'full recyclage',
                                                        'image' => 'https://www.jeux-de-plein-air.com/115239-thickbox_default/telephone-en-plastique-jaune-akubi.jpg',
                                                        'price' => 1
                                                    ]);
    $result = $productList->__soapCall('addProduct', [
                                                        'marque' => 'golden',
                                                        'model' => 'phonecall',
                                                        'description' => 'pour tous ceux qui roule en golden lamborgini',
                                                        'image' => 'https://static.printler.com/cache/3/a/8/2/e/f/3a82ef7fbb8f410650f01754abfe23ceda8d0313.jpg',
                                                        'price' => 1
                                                    ]);
    $result = $productList->__soapCall('deleteProduct',[1]);

    // Affichage des résultats
    echo "<pre>";
    var_dump($result);
    echo "</pre>";







?>