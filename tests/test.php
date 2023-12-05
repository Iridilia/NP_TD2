<?php
// PHP
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use catadoct\catalog\entities\Produit;
use catadoct\catalog\entities\Categorie;

require_once "vendor/autoload.php";

// Configuration de Doctrine
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), true);
$entityManager = EntityManager::create($dbParams, $config);

// 1. Afficher le produit d'identifiant 4
$product = $entityManager->find(Produit::class, 4);
echo "Produit: {$product->getLibelle()}, Description: {$product->getDescription()}, Image: {$product->getImage()}";

// 2. Afficher la catégorie 5
$category = $entityManager->find(Categorie::class, 5);
echo "Catégorie: {$category->getLibelle()}";

// 3. Afficher la catégorie du produit
$productCategory = $entityManager->find(Categorie::class, $product->getCategorieId());
echo "Catégorie du produit: {$productCategory->getLibelle()}";

// 4. Afficher tous les produits de la catégorie 5
$products = $entityManager->getRepository(Produit::class)->findBy(array('categorie_id' => $category->getId()));
foreach ($products as $product) {
    echo "Produit: {$product->getLibelle()}";
}

// 5. Créer un produit et le relier à la catégorie 5
$newProduct = new Produit("1", "1", "Tomate", "Tomate Ronde", "Image.png", "Legume");
$entityManager->persist($newProduct);
$entityManager->flush();

// 6. Modifier ce produit et mettre à jour la base
$newProduct->setLibelle("Tomate Ronde");
$entityManager->flush();

// 7. Supprimer ce produit et mettre à jour la base
$entityManager->remove($newProduct);
$entityManager->flush();
?>