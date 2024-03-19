<?php 

$products = [
    [
        "id" => 1,
        "marque" => "Samsung",
        "model" => "Galaxy S24",
        "description" => "Le Samsung Galaxy S24 Ultra est un smartphone haut de gamme vendu à partir de 1469 euros et dévoilé le 17 janvier. Il est équipé d'un Snapdragon 8 Gen 3, d'un quadruple module photos, dont deux téléobjectifs X3 et X5. Il possède une batterie de 5000 mAh et…",
        "image" => "https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSOHzogJlK8vEjAYQ1KzIZ8hcamcjrrFN-XFY_xNAU__PR6G4zi6zkeawh5n9Ki-8sTAA5BVnezqVRB2UGhrkCK6XnuT-Cfh-lc_ftO14qyn4pV6N7n5zNW",
        "price" => 899
    ],
    [
        "id" => 2,
        "marque" => "Xiaomi",
        "model" => "Redmi Note 12",
        "description" => "Le Xiaomi Redmi Note 12 est équipé d'une triple caméra IA offrant jusqu'à 50 mégapixels. Le capteur ultra grand-angle offre une résolution de 8 mégapixels, il réalisera de superbes panoramas de paysage ou des photos de groupes sans oublier personne.",
        "image"=> "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRzqVjs7M_hyUisY2uKrRHgefM577sl1qkHjctEfIeVrgVnowlV_a2a_LaVQgSj6WckiUyPmxKS7OAYc8XCJyrDq3DxpSazSKQceE6ObUBn9Wb6P55o57Wu",
        "price" => 140
    ],
    [
        "id" => 3,
        "marque" => "Apple",
        "model" => "Iphone 13",
        "description" => "Écran Super Retina XDR; OLED tout écran de 6,1 pouces (diagonale); Résolution de 2 532 x 1 170 pixels à 460 ppp; Écran HDR; True Tone ...",
        "image" => "https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRsHz0Zc_9BdYRwefjkUwftD1L-1UQodJ2XM7cMxjcL7plNnz7lk91pGBvXbNtUytjnde-zt1bjEC675O1TbxVtW6M_BDfWhsTO9tEnb5WxzchrntTDO_Zp",
        "price" => 650
    ],
    [
        "id" => 4,
        "marque" => "Honor",
        "model" => "Magic V2",
        "description" => "Ce modèle pliant, doté d'un écran intérieur de 7,92 pouces et d'une dalle externe de 6,43 pouces, s'appuie sur l'incontournable puce Snapdragon 8 Gen 2 de Qualcomm, flanquée de 16 Go de mémoire vive et 512 Go de stockage, mais aussi d'une batterie de 5000 mAh.",
        "image" => "https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcR2vlCQu79AoPWzhEnClKc5Mv_YGeXeCtsMV8Vyz9kziFalR1Sx6YORtop-9KLJICByY5n_c9tWPSQfsfUyZS06_DNLxvinaZYkw0tCSVcb3KmzlF0SVMvU",
        "price" => 1500
    ]
];

// On vérifie la méthode HTTP
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // ici on affiche le type de réponses et des requêtes pour préparer le traitement pour le navigateur
    header('Content-type: application/json');
    header('Access-Control-Allow-Origin: *');


    // Envoie les données des produits au format JSON

    echo json_encode($products);

    //

}