<?php

namespace Jonathan\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agents
 *
 * @ORM\Table(name="agents")
 * @ORM\Entity
 */
class Agents
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_agents", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAgents;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo_a", type="string", length=255, nullable=false)
     */
    private $pseudoA;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe_a", type="string", length=255, nullable=false)
     */
    private $motDePasseA;

    /**
     * @var int
     *
     * @ORM\Column(name="niveau_accreditation_a", type="integer", nullable=false)
     */
    private $niveauAccreditationA;

    /**
     * Get the value of motDePasseA
     *
     * @return  string
     */ 
    public function getMotDePasseA()
    {
        return $this->motDePasseA;
    }
    
    /**
     * Get the value of niveauAccreditationA
     *
     * @return  int
     */ 
    public function getNiveauAccreditationA()
    {
        return $this->niveauAccreditationA;
    }
    
}
