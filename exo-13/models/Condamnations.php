<?php

namespace Jonathan\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condamnations
 *
 * @ORM\Table(name="condamnations", indexes={@ORM\Index(name="fk_condamnations_recherches_idx", columns={"recherches_id_r"})})
 * @ORM\Entity
 */
class Condamnations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_c", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idC;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_affaire_c", type="string", length=45, nullable=false)
     */
    private $libelleAffaireC;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_c", type="date", nullable=false)
     */
    private $dateC;

    /**
     * @var int
     *
     * @ORM\Column(name="duree_c", type="integer", nullable=false)
     */
    private $dureeC;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_liberation_c", type="date", nullable=true)
     */
    private $dateLiberationC;

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
     * @var \Jonathan\Models\Recherches
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Jonathan\Models\Recherches")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recherches_id_r", referencedColumnName="id_r")
     * })
     */
    private $recherchesIdR;


}
