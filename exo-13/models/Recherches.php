<?php

namespace Jonathan\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recherches
 *
 * @ORM\Table(name="recherches")
 * @ORM\Entity
 */
class Recherches
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_r", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idR;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_r", type="string", length=255, nullable=false)
     */
    private $nomR;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_r", type="string", length=255, nullable=false)
     */
    private $prenomR = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance_r", type="date", nullable=false)
     */
    private $dateNaissanceR;

    /**
     * @var string
     *
     * @ORM\Column(name="signe_distinctif_r", type="string", length=255, nullable=false)
     */
    private $signeDistinctifR;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profil_psy_r", type="text", length=0, nullable=true)
     */
    private $profilPsyR;

    /**
     * @var int
     *
     * @ORM\Column(name="niveau_accreditation", type="integer", nullable=false)
     */
    private $niveauAccreditation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_photo_r", type="string", length=255, nullable=false)
     */
    private $nomPhotoR;

    /**
     * @var string|null
     *
     * @ORM\Column(name="informations_r", type="text", length=0, nullable=true)
     */
    private $informationsR;

    /**
     * @var string
     *
     * @ORM\Column(name="derniere_adresse_r", type="string", length=255, nullable=false)
     */
    private $derniereAdresseR;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=255, nullable=false)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="date", nullable=false)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="updated_by", type="string", length=255, nullable=false)
     */
    private $updatedBy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Jonathan\Models\Recherches", inversedBy="recherchesIdR")
     * @ORM\JoinTable(name="acolytes",
     *   joinColumns={
     *     @ORM\JoinColumn(name="recherches_id_r", referencedColumnName="id_r")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="recherches_id_r1", referencedColumnName="id_r")
     *   }
     * )
     */
    private $recherchesIdR1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Jonathan\Models\Temoignages", mappedBy="recherchesIdR")
     */
    private $temoignagesIdTemoignage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recherchesIdR1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->temoignagesIdTemoignage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get the value of recherchesIdR1
     *
     * @return  \Doctrine\Common\Collections\Collection
     */ 
    public function getRecherchesIdR1()
    {
        return $this->recherchesIdR1;
    }

    /**
     * Get the value of temoignagesIdTemoignage
     *
     * @return  \Doctrine\Common\Collections\Collection
     */ 
    public function getTemoignagesIdTemoignage()
    {
        return $this->temoignagesIdTemoignage;
    }

    /**
     * Get the value of idR
     *
     * @return  int
     */ 
    public function getIdR()
    {
        return $this->idR;
    }

    /**
     * Get the value of nomR
     *
     * @return  string
     */ 
    public function getNomR()
    {
        return $this->nomR;
    }

    /**
     * Get the value of prenomR
     *
     * @return  string
     */ 
    public function getPrenomR()
    {
        return $this->prenomR;
    }

    /**
     * Get the value of dateNaissanceR
     *
     * @return  \DateTime
     */ 
    public function getDateNaissanceR()
    {
        return $this->dateNaissanceR;
    }

    /**
     * Get the value of signeDistinctifR
     *
     * @return  string
     */ 
    public function getSigneDistinctifR()
    {
        return $this->signeDistinctifR;
    }

    /**
     * Get the value of profilPsyR
     *
     * @return  string|null
     */ 
    public function getProfilPsyR()
    {
        return $this->profilPsyR;
    }

    /**
     * Get the value of niveauAccreditation
     *
     * @return  int
     */ 
    public function getNiveauAccreditation()
    {
        return $this->niveauAccreditation;
    }

    /**
     * Get the value of nomPhotoR
     *
     * @return  string
     */ 
    public function getNomPhotoR()
    {
        return $this->nomPhotoR;
    }

    /**
     * Get the value of informationsR
     *
     * @return  string|null
     */ 
    public function getInformationsR()
    {
        return $this->informationsR;
    }

    /**
     * Get the value of derniereAdresseR
     *
     * @return  string
     */ 
    public function getDerniereAdresseR()
    {
        return $this->derniereAdresseR;
    }

    /**
     * Get the value of createdAt
     *
     * @return  \DateTime
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get the value of createdBy
     *
     * @return  string
     */ 
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Get the value of updatedAt
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Get the value of updatedBy
     *
     * @return  string
     */ 
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
    

    /**
     * Set the value of nomR
     *
     * @param  string  $nomR
     *
     * @return  self
     */ 
    public function setNomR(string $nomR)
    {
        $this->nomR = $nomR;

        return $this;
    }

    /**
     * Set the value of prenomR
     *
     * @param  string  $prenomR
     *
     * @return  self
     */ 
    public function setPrenomR(string $prenomR)
    {
        $this->prenomR = $prenomR;

        return $this;
    }

    /**
     * Set the value of dateNaissanceR
     *
     * @param  \DateTime  $dateNaissanceR
     *
     * @return  self
     */ 
    public function setDateNaissanceR(\DateTime $dateNaissanceR)
    {
        $this->dateNaissanceR = $dateNaissanceR;

        return $this;
    }

    /**
     * Set the value of signeDistinctifR
     *
     * @param  string  $signeDistinctifR
     *
     * @return  self
     */ 
    public function setSigneDistinctifR(string $signeDistinctifR)
    {
        $this->signeDistinctifR = $signeDistinctifR;

        return $this;
    }

    /**
     * Set the value of profilPsyR
     *
     * @param  string|null  $profilPsyR
     *
     * @return  self
     */ 
    public function setProfilPsyR($profilPsyR)
    {
        $this->profilPsyR = $profilPsyR;

        return $this;
    }

    /**
     * Set the value of niveauAccreditation
     *
     * @param  int  $niveauAccreditation
     *
     * @return  self
     */ 
    public function setNiveauAccreditation(int $niveauAccreditation)
    {
        $this->niveauAccreditation = $niveauAccreditation;

        return $this;
    }

    /**
     * Set the value of nomPhotoR
     *
     * @param  string  $nomPhotoR
     *
     * @return  self
     */ 
    public function setNomPhotoR(string $nomPhotoR)
    {
        $this->nomPhotoR = $nomPhotoR;

        return $this;
    }

    /**
     * Set the value of informationsR
     *
     * @param  string|null  $informationsR
     *
     * @return  self
     */ 
    public function setInformationsR($informationsR)
    {
        $this->informationsR = $informationsR;

        return $this;
    }

    /**
     * Set the value of derniereAdresseR
     *
     * @param  string  $derniereAdresseR
     *
     * @return  self
     */ 
    public function setDerniereAdresseR(string $derniereAdresseR)
    {
        $this->derniereAdresseR = $derniereAdresseR;

        return $this;
    }
    

    /**
     * Set the value of createdAt
     *
     * @param  \DateTime  $createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set the value of createdBy
     *
     * @param  string  $createdBy
     *
     * @return  self
     */ 
    public function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \DateTime  $updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Set the value of updatedBy
     *
     * @param  string  $updatedBy
     *
     * @return  self
     */ 
    public function setUpdatedBy(string $updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }
}
