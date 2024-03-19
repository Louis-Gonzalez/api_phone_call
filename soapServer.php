<?php

// Définition des fonctions du services (ex: fonction addition)
function getProducts(){
    $products = file_get_contents('http://localhost/php_web_services2/products.php');
    // echo "<pre>";
    // var_dump(json_decode($products));
    // echo "</pre>";
    $products = json_decode($products);
    return $products;
}

function getProductById(int $id){

    if ($id <= 0) {
        throw new InvalidArgumentException("L'ID du produit doit être un entier positif.");
    }
    $products = getProducts();
    foreach($products as $product){
        if($product->id == $id){
            return $product;
        }
    }
}

function addProduct($marque, $model, $description, $image, $price) {

    // Vérification des paramètres
        if (empty($marque) || empty($model) || empty ($description) || empty($image) ||empty($price)
        || !is_string($marque) || !is_string($model) || !is_string($description) || !is_string($image) || !is_numeric($price)) {
        throw new InvalidArgumentException("Le nom du produit doit être non vide et le prix doit être un nombre positif.");
        }
    
    // Récupération de la liste actuelle des produits
    $products = getProducts();

    // Création d'un nouvel ID pour le produit
    $newProductId = count($products) + 1;

    // Création d'un objet représentant le nouveau produit
    $newProduct = new stdClass();
    $newProduct->id = $newProductId;
    $newProduct->marque = $marque;
    $newProduct->model = $model;
    $newProduct->description = $description;
    $newProduct->image = $image;
    $newProduct->price = $price;

    // Ajout du nouveau produit à la liste des produits
    $products[] = $newProduct; 

    // Enregistrement de la liste mise à jour des produits
    file_put_contents('http://localhost/php_web_services2/products.php', json_encode($products));

    // Retour du produit ajouté
    return $products;
}


function deleteProduct(int $id) {
    // Vérification de l'ID du produit
    if ($id <= 0) {
        throw new InvalidArgumentException("L'ID du produit doit être un entier positif.");
    }
    // Récupération de la liste actuelle des produits
    $products = getProducts();

    // Recherche du produit par son ID
    $productIndex = null;
    foreach($products as $index => $product){
        if($product->id == $id){
            $productIndex = $index;
            break;
        }
    }
    // Vérification si le produit a été trouvé
    if ($productIndex === null) {
        throw new RuntimeException("Le produit avec l'ID spécifié n'existe pas.");
    }
    // Suppression du produit de la liste des produits
    unset($products[$productIndex]);
    // Réindexation des clés du tableau
    $products = array_values($products);

    // Enregistrement de la liste mise à jour des produits
    // file_put_contents('http://localhost/php_web_services2/products.php', json_encode($products));

    // Retour de l'ID du produit supprimé
    return $products;
}
    

function updateProduct(){
    
}

///////////////////////////////////////////////// Création du serveur SOAP //////////////////////////////////////////////////////////

// Définition du tableau d'options (uri, encoding, etc ...)
$options = [
    'uri' => 'http://localhost/php_web_services2/soapServer.php', // chemin où se trouve le fichier server.php
    'encoding' => 'UTF-8', // type de caractère vu par le serveur
];

////////////////////////////////////////////////// Instancier le serveur avec la classe SoapServer de PHP ////////////////////////////////////////////////
// le ficheir wsdl sert à configurer le serveur et permet de générer la revue de code
// soapServer est un objet de la classe SoapServer qui à 2 params : le fichier wsdl dan le cas présent noté à null et le tableau d'options
$server = new SoapServer(null, $options);  

// Définition des méthodes du service avec la fonction addFunction
$server->addFunction('getProducts');
$server->addFunction('getProductById');
$server->addFunction('addProduct');
$server->addFunction('deleteProduct');
// $server->addFunction('updateProduct'); // on applle le fonction addition à la ligne 4

//////////////////////////////////////////////// Gestion des requêtes //////////////////////////////////////////////////////////
// Lancement du serveur pour la gestion des requêtes
$server-> handle();



?>