<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FollowedAdvisor
 *
 * @ORM\Table(name="followed_advisor", indexes={@ORM\Index(name="id_orp", columns={"id_orp"}), @ORM\Index(name="id_candidate", columns={"id_candidate"})})
 * @ORM\Entity
 */
class FollowedAdvisor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_fa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_date", type="datetime", nullable=false)
     */
    private $registrationDate;

    /**
     * @var \Orp
     *
     * @ORM\ManyToOne(targetEntity="Orp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_orp", referencedColumnName="id_orp")
     * })
     */
    private $idOrp;

    /**
     * @var \Candidat
     *
     * @ORM\ManyToOne(targetEntity="Candidat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_candidate", referencedColumnName="id_candidate")
     * })
     */
    private $idCandidate;

    public function getIdFa(): ?int
    {
        return $this->idFa;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(\DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    public function getIdOrp(): ?Orp
    {
        return $this->idOrp;
    }

    public function setIdOrp(?Orp $idOrp): self
    {
        $this->idOrp = $idOrp;

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
