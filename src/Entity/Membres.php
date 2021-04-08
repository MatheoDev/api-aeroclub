<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Membres
 *
 * @ORM\Table(name="membres", indexes={@ORM\Index(name="i_fk_membres_qualif", columns={"num_qualif"}), @ORM\Index(name="i_fk_membres_civilite", columns={"num_civilite"})})
 * @ORM\Entity
 */
class Membres
{
    /**
     * @var int
     *
     * @ORM\Column(name="num_membre", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="membres_num_membre_seq", allocationSize=1, initialValue=1)
     */
    private $numMembre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=50, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_postal", type="string", length=5, nullable=true)
     */
    private $codePostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel", type="string", length=50, nullable=true)
     */
    private $tel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_vm", type="date", nullable=true)
     */
    private $dateVm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="validite_vm", type="date", nullable=true)
     */
    private $validiteVm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_sep", type="date", nullable=true)
     */
    private $dateSep;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="validite_sep", type="date", nullable=true)
     */
    private $validiteSep;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_badge", type="string", length=50, nullable=true)
     */
    private $numBadge;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profession", type="string", length=50, nullable=true)
     */
    private $profession;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="carte_federale", type="string", length=50, nullable=true)
     */
    private $carteFederale;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_attestation", type="date", nullable=true)
     */
    private $dateAttestation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_entree", type="date", nullable=true)
     */
    private $dateEntree;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="membre_actif", type="boolean", nullable=true, options={"default"="1"})
     */
    private $membreActif = true;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="membre_inscrit", type="boolean", nullable=true)
     */
    private $membreInscrit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $password;

    /**
     * @var \Qualif
     *
     * @ORM\ManyToOne(targetEntity="Qualif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_qualif", referencedColumnName="num_qualif")
     * })
     */
    private $numQualif;

    /**
     * @var \Civilite
     *
     * @ORM\ManyToOne(targetEntity="Civilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_civilite", referencedColumnName="num_civilite")
     * })
     */
    private $numCivilite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Permis", inversedBy="numMembre")
     * @ORM\JoinTable(name="obtenu",
     *   joinColumns={
     *     @ORM\JoinColumn(name="num_membre", referencedColumnName="num_membre")
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

    public function getNumMembre(): ?string
    {
        return $this->numMembre;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDateVm(): ?\DateTimeInterface
    {
        return $this->dateVm;
    }

    public function setDateVm(?\DateTimeInterface $dateVm): self
    {
        $this->dateVm = $dateVm;

        return $this;
    }

    public function getValiditeVm(): ?\DateTimeInterface
    {
        return $this->validiteVm;
    }

    public function setValiditeVm(?\DateTimeInterface $validiteVm): self
    {
        $this->validiteVm = $validiteVm;

        return $this;
    }

    public function getDateSep(): ?\DateTimeInterface
    {
        return $this->dateSep;
    }

    public function setDateSep(?\DateTimeInterface $dateSep): self
    {
        $this->dateSep = $dateSep;

        return $this;
    }

    public function getValiditeSep(): ?\DateTimeInterface
    {
        return $this->validiteSep;
    }

    public function setValiditeSep(?\DateTimeInterface $validiteSep): self
    {
        $this->validiteSep = $validiteSep;

        return $this;
    }

    public function getNumBadge(): ?string
    {
        return $this->numBadge;
    }

    public function setNumBadge(?string $numBadge): self
    {
        $this->numBadge = $numBadge;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getCarteFederale(): ?string
    {
        return $this->carteFederale;
    }

    public function setCarteFederale(?string $carteFederale): self
    {
        $this->carteFederale = $carteFederale;

        return $this;
    }

    public function getDateAttestation(): ?\DateTimeInterface
    {
        return $this->dateAttestation;
    }

    public function setDateAttestation(?\DateTimeInterface $dateAttestation): self
    {
        $this->dateAttestation = $dateAttestation;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(?\DateTimeInterface $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    public function getMembreActif(): ?bool
    {
        return $this->membreActif;
    }

    public function setMembreActif(?bool $membreActif): self
    {
        $this->membreActif = $membreActif;

        return $this;
    }

    public function getMembreInscrit(): ?bool
    {
        return $this->membreInscrit;
    }

    public function setMembreInscrit(?bool $membreInscrit): self
    {
        $this->membreInscrit = $membreInscrit;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNumQualif(): ?Qualif
    {
        return $this->numQualif;
    }

    public function setNumQualif(?Qualif $numQualif): self
    {
        $this->numQualif = $numQualif;

        return $this;
    }

    public function getNumCivilite(): ?Civilite
    {
        return $this->numCivilite;
    }

    public function setNumCivilite(?Civilite $numCivilite): self
    {
        $this->numCivilite = $numCivilite;

        return $this;
    }

    /**
     * @return Collection|Permis[]
     */
    public function getId(): Collection
    {
        return $this->id;
    }

    public function addId(Permis $id): self
    {
        if (!$this->id->contains($id)) {
            $this->id[] = $id;
        }

        return $this;
    }

    public function removeId(Permis $id): self
    {
        $this->id->removeElement($id);

        return $this;
    }

}
