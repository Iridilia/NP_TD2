<?php
use catadoct\catalog\entities\Produit;
use catadoct\catalog\entities\Categorie;

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../config/doctrine.php";

print '-------------------------------------------------------------';
// 1. Afficher le produit d'identifiant 4
$product = $entityManager->find(Produit::class, 4);
echo "Produit: {$product->getLibelle()}, Description: {$product->getDescription()}, Image: {$product->getImage()}";

// 2. Afficher la catégorie 5
$category = $entityManager->find(Categorie::class, 5);
echo "Catégorie: {$category->getLibelle()}";

// 3. Afficher la catégorie du produit
$product = $entityManager->find(Produit::class, 4);
$category=$product->getCategorie();
echo "Catégorie du produit: {$category->getLibelle()}";

// 4. Afficher tous les produits de la catégorie 5
$category = $entityManager->find(Categorie::class,5);
$products=$category->getProduits();
foreach($products as $product) {
    echo $product->getLibelle();
}

// 5. Créer un produit et le relier à la catégorie 5
$newProduct = new Produit(1, "Tomate", "Tomate Ronde", "Image.png");
//$entityManager->persist($newProduct);
//$entityManager->flush();

// 6. Modifier ce produit et mettre à jour la base
$newProduct->setLibelle("Tomate Ronde");
$entityManager->flush();

// 7. Supprimer ce produit et mettre à jour la base
$entityManager->remove($newProduct);
$entityManager->flush();
?>