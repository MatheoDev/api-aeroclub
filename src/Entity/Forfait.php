<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Forfait
 *
 * @ORM\Table(name="forfait")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ForfaitRepository")
 */
class Forfait
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="forfait_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $libelle;

    /**
     * @var int|null
     *
     * @ORM\Column(name="heure", type="integer", nullable=true)
     */
    private $heure;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Avions", mappedBy="id")
     */
    private $numAvion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numAvion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getHeure(): ?int
    {
        return $this->heure;
    }

    public function setHeure(?int $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * @return Collection|Avions[]
     */
    public function getNumAvion(): Collection
    {
        return $this->numAvion;
    }

    public function addNumAvion(Avions $numAvion): self
    {
        if (!$this->numAvion->contains($numAvion)) {
            $this->numAvion[] = $numAvion;
            $numAvion->addId($this);
        }

        return $this;
    }

    public function removeNumAvion(Avions $numAvion): self
    {
        if ($this->numAvion->removeElement($numAvion)) {
            $numAvion->removeId($this);
        }

        return $this;
    }

}
