<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Avions
 *
 * @ORM\Table(name="avions")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AvionsRepository")
 * @ApiResource()
 */
class Avions
{
    /**
     * @var int
     *
     * @ORM\Column(name="num_avion", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="avions_num_avion_seq", allocationSize=1, initialValue=1)
     */
    private $numAvion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="immatriculation", type="string", length=50, nullable=true)
     */
    private $immatriculation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Forfait", inversedBy="numAvion")
     * @ORM\JoinTable(name="avionforfait",
     *   joinColumns={
     *     @ORM\JoinColumn(name="num_avion", referencedColumnName="num_avion")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id", referencedColumnName="id")
     *   }
     * )
     */
    private $id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getNumAvion(): ?string
    {
        return $this->numAvion;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * @return Collection|Forfait[]
     */
    public function getId(): Collection
    {
        return $this->id;
    }

    public function addId(Forfait $id): self
    {
        if (!$this->id->contains($id)) {
            $this->id[] = $id;
        }

        return $this;
    }

    public function removeId(Forfait $id): self
    {
        $this->id->removeElement($id);

        return $this;
    }

}
