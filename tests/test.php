<?php
// PHP
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Configuration de Doctrine
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), true);
$entityManager = EntityManager::create($dbParams, $config);

// 1. Afficher le produit d'identifiant 4
$product = $entityManager->find('Product', 4);
echo "Produit: {$product->getLibelle()}, Description: {$product->getDescription()}, Image: {$product->getImage()}";

// 2. Afficher la catégorie 5
$category = $entityManager->find('Category', 5);
echo "Catégorie: {$category->getLibelle()}";

// 3. Afficher la catégorie du produit
echo "Catégorie du produit: {$product->getCategory()->getLibelle()}";

// 4. Afficher tous les produits de la catégorie 5
$products = $entityManager->getRepository('Product')->findBy(array('category' => 5));
foreach ($products as $product) {
    echo "Produit: {$product->getLibelle()}";
}

// 5. Créer un produit et le relier à la catégorie 5
$newProduct = new Product();
$newProduct->setLibelle("Nouveau produit");
$newProduct->setDescription("Description du nouveau produit");
$newProduct->setImage("image.jpg");
$newProduct->setCategory($category);
$entityManager->persist($newProduct);
$entityManager->flush();

// 6. Modifier ce produit et mettre à jour la base
$newProduct->setLibelle("Produit modifié");
$entityManager->flush();

// 7. Supprimer ce produit et mettre à jour la base
$entityManager->remove($newProduct);
$entityManager->flush();
?>