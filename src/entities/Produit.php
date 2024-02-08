<?php
namespace catadoct\catalog\entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

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

    #[Column(type: Types::STRING)]
    private string $libelle;

    #[Column( type: Types::TEXT,
    nullable: true)]
    private string $description;

    #[Column( type: Types::STRING,
    nullable:true)]
    private string $image;

    #[ManyToOne(targetEntity: Categorie::class)]
    #[JoinColumn(name: "categorie_id", referencedColumnName: "id")]
    private Categorie|null $categorie;

    public function __construct($numero, $libelle, $description, $image)
    {
        $this->numero = $numero;
        $this->libelle = $libelle;
        $this->description = $description;
        $this->image = $image;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getNumero(): int
    {
        return $this->numero;
    }
    public function setNumero(int $numero):void {
        $this->numero=$numero;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }
    public function setLibelle(string $libelle):void {
        $this->libelle=$libelle;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $description):void {
        $this->description=$description;
    }
    public function getImage(): string
    {
        return $this->image;
    }
    public function setImage(string $image):void {
        $this->image=$image;
    }
    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }
    public function setCategorie($categorie): void
    {
        $this->categorie=$categorie;
    }
}