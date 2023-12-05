<?php

namespace catadoct\catalog\entities;

class Produit
{
    private $id;
    private $numero;
    private $libelle;
    private $description;
    private $image;
    private $categorie_id;

    public function __construct($id, $numero, $libelle, $description, $image, $categorie_id)
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->libelle = $libelle;
        $this->description = $description;
        $this->image = $image;
        $this->categorie_id = $categorie_id;
    }
}