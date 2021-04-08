<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Permis
 *
 * @ORM\Table(name="permis")
 * @ORM\Entity
 */
class Permis
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="permis_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Membres", mappedBy="id")
     */
    private $numMembre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numMembre = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * @return Collection|Membres[]
     */
    public function getNumMembre(): Collection
    {
        return $this->numMembre;
    }

    public function addNumMembre(Membres $numMembre): self
    {
        if (!$this->numMembre->contains($numMembre)) {
            $this->numMembre[] = $numMembre;
            $numMembre->addId($this);
        }

        return $this;
    }

    public function removeNumMembre(Membres $numMembre): self
    {
        if ($this->numMembre->removeElement($numMembre)) {
            $numMembre->removeId($this);
        }

        return $this;
    }

}
