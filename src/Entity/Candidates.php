<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Candidates
 *
 * @ORM\Table(name="candidates", indexes={@ORM\Index(name="id_department", columns={"id_department"})})
 * @ORM\Entity
 */
class Candidates
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_candidat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCandidat;

    /**
     * @var int
     *
     * @ORM\Column(name="gender", type="integer", nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=45, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=45, nullable=false)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=45, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime", nullable=false)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=45, nullable=false)
     */
    private $phoneNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="civil_status", type="integer", nullable=false)
     */
    private $civilStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="orp_registration_date", type="string", length=45, nullable=false)
     */
    private $orpRegistrationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="do_bilan", type="integer", nullable=false)
     */
    private $doBilan;

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
     * @ORM\ManyToMany(targetEntity="Orps", mappedBy="idCandidat")
     */
    private $idOrp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="UnemploymentFunds", inversedBy="idCandidat")
     * @ORM\JoinTable(name="unemployment_funds_candidates",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_candidat", referencedColumnName="id_candidat")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_unemployment_fund", referencedColumnName="id_unemployment_fund")
     *   }
     * )
     */
    private $idUnemploymentFund;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idOrp = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idUnemploymentFund = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdCandidat(): ?int
    {
        return $this->idCandidat;
    }

    public function getGender(): ?int
    {
        return $this->gender;
    }

    public function setGender(int $gender): self
    {
        $this->gender = $gender;

        return $this;
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getCivilStatus(): ?int
    {
        return $this->civilStatus;
    }

    public function setCivilStatus(int $civilStatus): self
    {
        $this->civilStatus = $civilStatus;

        return $this;
    }

    public function getOrpRegistrationDate(): ?string
    {
        return $this->orpRegistrationDate;
    }

    public function setOrpRegistrationDate(string $orpRegistrationDate): self
    {
        $this->orpRegistrationDate = $orpRegistrationDate;

        return $this;
    }

    public function getDoBilan(): ?int
    {
        return $this->doBilan;
    }

    public function setDoBilan(int $doBilan): self
    {
        $this->doBilan = $doBilan;

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
     * @return Collection|Orps[]
     */
    public function getIdOrp(): Collection
    {
        return $this->idOrp;
    }

    public function addIdOrp(Orps $idOrp): self
    {
        if (!$this->idOrp->contains($idOrp)) {
            $this->idOrp[] = $idOrp;
            $idOrp->addIdCandidat($this);
        }

        return $this;
    }

    public function removeIdOrp(Orps $idOrp): self
    {
        if ($this->idOrp->contains($idOrp)) {
            $this->idOrp->removeElement($idOrp);
            $idOrp->removeIdCandidat($this);
        }

        return $this;
    }

    /**
     * @return Collection|UnemploymentFunds[]
     */
    public function getIdUnemploymentFund(): Collection
    {
        return $this->idUnemploymentFund;
    }

    public function addIdUnemploymentFund(UnemploymentFunds $idUnemploymentFund): self
    {
        if (!$this->idUnemploymentFund->contains($idUnemploymentFund)) {
            $this->idUnemploymentFund[] = $idUnemploymentFund;
        }

        return $this;
    }

    public function removeIdUnemploymentFund(UnemploymentFunds $idUnemploymentFund): self
    {
        if ($this->idUnemploymentFund->contains($idUnemploymentFund)) {
            $this->idUnemploymentFund->removeElement($idUnemploymentFund);
        }

        return $this;
    }

}
