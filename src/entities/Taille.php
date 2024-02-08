<?php
namespace catadoct\catalog\entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "taille")]
class Taille
{
    #[Id]
    #[Column(type: Types::INTEGER)]
    #[GeneratedValue(strategy: "AUTO")]
    private int $id;
    #[Column(type: Types::STRING)]
    private string $libelle;

    #[OneToMany(targetEntity: Tarif::class, mappedBy: "taille")]
    private Collection $tailles;

    public function __construct($id, $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->tailles = new ArrayCollection();
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getLibelle(): string
    {
        return $this->libelle;
    }
    public function getTailles(): Collection
    {
        return $this->tailles;
    }
}