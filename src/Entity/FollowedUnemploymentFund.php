<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FollowedUnemploymentFund
 *
 * @ORM\Table(name="followed_unemployment_fund", indexes={@ORM\Index(name="id_unemployment_fund", columns={"id_unemployment_fund"}), @ORM\Index(name="id_candidate", columns={"id_candidate"})})
 * @ORM\Entity
 */
class FollowedUnemploymentFund
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_fuf", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuf;

    /**
     * @var \UnemploymentFund
     *
     * @ORM\ManyToOne(targetEntity="UnemploymentFund")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_unemployment_fund", referencedColumnName="id_unemployment_fund")
     * })
     */
    private $idUnemploymentFund;

    /**
     * @var \Candidat
     *
     * @ORM\ManyToOne(targetEntity="Candidat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_candidate", referencedColumnName="id_candidate")
     * })
     */
    private $idCandidate;

    public function getIdFuf(): ?int
    {
        return $this->idFuf;
    }

    public function getIdUnemploymentFund(): ?UnemploymentFund
    {
        return $this->idUnemploymentFund;
    }

    public function setIdUnemploymentFund(?UnemploymentFund $idUnemploymentFund): self
    {
        $this->idUnemploymentFund = $idUnemploymentFund;

        return $this;
    }

    public function getIdCandidate(): ?Candidat
    {
        return $this->idCandidate;
    }

    public function setIdCandidate(?Candidat $idCandidate): self
    {
        $this->idCandidate = $idCandidate;

        return $this;
    }


}
