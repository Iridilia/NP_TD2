<?php
use catadoct\catalog\entities\Produit;
use catadoct\catalog\entities\Categorie;

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../config/doctrine.php";

//1. Afficher le produit numéro 4 (requête simple)
$query = $entityManager->createQuery('SELECT p FROM catadoct\catalog\entities\Produit p WHERE p.numero = 4');
$result = $query->getResult();

//2. Afficher le produit numéro 5 et de libellé 'Pepperoni' s'il existe (requête simple)
$query = $entityManager->createQuery('SELECT p FROM catadoct\catalog\entities\Produit p WHERE p.numero = 5 AND p.libelle = :libelle')
    ->setParameter('libelle', 'Pepperoni');
$result = $query->getResult();

//3. Afficher la catégorie de libellé 'Boissons' ainsi que les produits de cette catégorie (requête simple)
$query = $entityManager->createQuery('SELECT c, p FROM catadoct\catalog\entities\Categorie c JOIN c.produits p WHERE c.libelle = :libelle')
    ->setParameter('libelle', 'Boissons');
$result = $query->getResult();

//4. Afficher les produits contenant 'mozzarella' dans leur description (utiliser une requête critères)
$queryBuilder = $entityManager->createQueryBuilder();
$query = $queryBuilder
    ->select('p')
    ->from('catadoct\catalog\entities\Produit', 'p')
    ->where($queryBuilder->expr()->like('p.description', ':keyword'))
    ->setParameter('keyword', '%mozzarella%')
    ->getQuery();
$result = $query->getResult();

//5. Afficher les produits de la catégorie 5 contenant 'jambon' dans la description (requête critères sur l'association)
$queryBuilder = $entityManager->createQueryBuilder();
$query = $queryBuilder
    ->select('p')
    ->from('catadoct\catalog\entities\Produit', 'p')
    ->join('p.categorie', 'c')
    ->where('c.id = :categorieId')
    ->andWhere($queryBuilder->expr()->like('p.description', ':keyword'))
    ->setParameter('categorieId', 5)
    ->setParameter('keyword', '%jambon%')
    ->getQuery();
$result = $query->getResult();