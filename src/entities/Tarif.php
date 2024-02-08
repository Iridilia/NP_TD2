<?php
namespace catadoct\catalog\entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "tarif")]
class Tarif
{
    #[Id]
    #[Column(type: Types::INTEGER)]
    #[GeneratedValue(strategy: "AUTO")]
    private int $id;

    #[Column( type: Types::FLOAT)]
    private string $tarif;

    #[ManyToOne(targetEntity: Produit::class)]
    #[JoinColumn(name: "produit_id", referencedColumnName: "id")]
    private Produit|null $produit;

    #[ManyToOne(targetEntity: Taille::class)]
    #[JoinColumn(name: "taille_id", referencedColumnName: "id")]
    private Taille|null $taille;

    public function __construct($id, $tarif, $produit, $taille)
    {
        $this->id = $id;
        $this->tarif = $tarif;
        $this->produit = $produit;
        $this->taille = $taille;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getTarif(): float
    {
        return $this->tarif;
    }
    public function getProduit(): string
    {
        return $this->produit;
    }
    public function getTaille(): string
    {
        return $this->taille;
    }
}