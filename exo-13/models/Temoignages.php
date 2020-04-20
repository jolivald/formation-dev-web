<?php

namespace Jonathan\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temoignages
 *
 * @ORM\Table(name="temoignages")
 * @ORM\Entity
 */
class Temoignages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_temoignage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTemoignage;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation_t", type="string", length=255, nullable=false)
     */
    private $localisationT;

    /**
     * @var string
     *
     * @ORM\Column(name="nature_t", type="text", length=0, nullable=false)
     */
    private $natureT;

    /**
     * @var string
     *
     * @ORM\Column(name="temoin_t", type="string", length=255, nullable=false)
     */
    private $temoinT;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_tel_temoin_t", type="string", length=255, nullable=true)
     */
    private $numeroTelTemoinT;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse_temoin_t", type="string", length=255, nullable=true)
     */
    private $adresseTemoinT;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_s", type="date", nullable=false)
     */
    private $dateS;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=45, nullable=false)
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
     * @ORM\Column(name="updated_by", type="string", length=45, nullable=false)
     */
    private $updatedBy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Jonathan\Models\Recherches", inversedBy="temoignagesIdTemoignage")
     * @ORM\JoinTable(name="signalements",
     *   joinColumns={
     *     @ORM\JoinColumn(name="temoignages_id_temoignage", referencedColumnName="id_temoignage")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="recherches_id_r", referencedColumnName="id_r")
     *   }
     * )
     */
    private $recherchesIdR;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recherchesIdR = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
