<?php
namespace catadoct\catalog\entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

class Tarif
{
    #[Id]
    #[Column(type: Types::INTEGER)]
    #[GeneratedValue(strategy: "AUTO")]
    private int $id;

    #[Column( type: Types::NUMERIC)]
    private string $tarif;

    #[ManyToOne(targetEntity: Produit::class)]
    #[JoinColumn(name: "produit_id", referencedColumnName: "id")]
    private ?Produit $produit = null;

    #[ManyToOne(targetEntity: Taille::class)]
    #[JoinColumn(name: "taille_id", referencedColumnName: "id")]
    private ?Taille $lieu = null;

    public function __construct($id, $tarif, $produit_id, $taille_id)
    {
        $this->id = $id;
        $this->tarif = $tarif;
        $this->produit_id = $produit_id;

        $this->taille_id = $taille_id;
    }
}