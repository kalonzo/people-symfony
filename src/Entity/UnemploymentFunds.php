<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * UnemploymentFunds
 *
 * @ORM\Table(name="unemployment_funds", indexes={@ORM\Index(name="id_department", columns={"id_department"})})
 * @ORM\Entity
 */
class UnemploymentFunds
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_unemployment_fund", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUnemploymentFund;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street", type="string", length=45, nullable=true)
     */
    private $street;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postal_code", type="string", length=45, nullable=true)
     */
    private $postalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=45, nullable=true)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone_number", type="string", length=45, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var \Departments
     *
     * @ORM\ManyToOne(targetEntity="Departments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_department", referencedColumnName="id_department")
     * })
     */
    private $idDepartment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Candidates", mappedBy="idUnemploymentFund")
     */
    private $idCandidat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCandidat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdUnemploymentFund(): ?int
    {
        return $this->idUnemploymentFund;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

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

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getIdDepartment(): ?Departments
    {
        return $this->idDepartment;
    }

    public function setIdDepartment(?Departments $idDepartment): self
    {
        $this->idDepartment = $idDepartment;

        return $this;
    }

    /**
     * @return Collection|Candidates[]
     */
    public function getIdCandidat(): Collection
    {
        return $this->idCandidat;
    }

    public function addIdCandidat(Candidates $idCandidat): self
    {
        if (!$this->idCandidat->contains($idCandidat)) {
            $this->idCandidat[] = $idCandidat;
            $idCandidat->addIdUnemploymentFund($this);
        }

        return $this;
    }

    public function removeIdCandidat(Candidates $idCandidat): self
    {
        if ($this->idCandidat->contains($idCandidat)) {
            $this->idCandidat->removeElement($idCandidat);
            $idCandidat->removeIdUnemploymentFund($this);
        }

        return $this;
    }

}
