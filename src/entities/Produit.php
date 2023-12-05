<?php
namespace catadoct\catalog\entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "produit")]
class Produit
{
    #[Id]
    #[Column(type: Types::INTEGER)]
    #[GeneratedValue(strategy: "AUTO")]
    private int $id;

    #[Column( type: Types::INTEGER)]
    private string $numero;

    #[Column(name: "libelle",
        type: Types::STRING,
        length: 64)]
    private string $libelle;

    #[Column( type: Types::TEXT)]
    private string $description;

    #[Column( type: Types::TEXT)]
    private string $image;

    #[ManyToOne(targetEntity: Categorie::class)]
    #[JoinColumn(name: "categorie_id", referencedColumnName: "id")]
    private ?Categorie $categorie = null;

    public function __construct($id, $numero, $libelle, $description, $image, $categorie_id)
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->libelle = $libelle;
        $this->description = $description;
        $this->image = $image;
        $this->categorie_id = $categorie_id;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }
}