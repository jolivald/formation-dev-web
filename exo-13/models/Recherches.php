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

}
