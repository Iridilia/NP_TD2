# Questions :
## 1. afficher le produit d'identifiant 4 : id, numéro, libellé, description, image.
SELECT id, numero, libelle, description, image
FROM produit
WHERE id = 4;

## 2. afficher la catégorie 5.
SELECT *
FROM categorie
WHERE id = 5;

## 3. compléter le script 1.1 pour afficher la catégorie du produit.
SELECT produit.id, numero, libelle, description, image, categorie.libelle AS categorie
FROM produit
INNER JOIN categorie ON produit.categorie_id = categorie.id
WHERE produit.id = 4;

## 4. Afficher tous les produits de la catégorie 5.
SELECT *
FROM produit
WHERE categorie_id = 5;

## 5. Créer un produit et le relier à la catégorie 5, faire en sorte qu'il soit sauvegardé dans la base.
INSERT INTO produit (numero, libelle, description, image, categorie_id)
VALUES (11, '4 fromages', '4 Fromages', 'URL image 4 fromages', 5);

## 6. Modifier ce produit et mettre à jour la base.
UPDATE produit 
SET libelle = 'Produit modifié', description = 'Description modifiée', image = 'URL de l'image modifiée'
WHERE id = 11;
## 7. Supprimer ce produit et mettre à jour la base.
DELETE FROM produit 
WHERE id = 11;
