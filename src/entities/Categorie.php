<?php
namespace catadoct\catalog\entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\Collection;

#[Entity]
#[Table(name: "categorie")]
class Categorie
{
    #[Id]
    #[Column(type: Types::INTEGER)]
    #[GeneratedValue(strategy: "AUTO")]
    private int $id;

    #[Column( type: Types::STRING)]
    private string $libelle;

    #[OneToMany(targetEntity: Produit::class, mappedBy: 'categorie')]
    private Collection $produits;

    public function __construct(string $libelle) {
        $this->libelle=$libelle;
        $this->produits = new ArrayCollection();
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getLibelle():string {
        return $this->libelle;
    }

    public function getProduits():Collection {
        return $this->produits;
    }
}