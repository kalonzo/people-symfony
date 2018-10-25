<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Orps
 *
 * @ORM\Table(name="orps")
 * @ORM\Entity
 */
class Orps
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_orp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrp;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=45, nullable=false)
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
     * @var string|null
     *
     * @ORM\Column(name="birthday", type="string", length=45, nullable=true)
     */
    private $birthday;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Candidates", inversedBy="idOrp")
     * @ORM\JoinTable(name="candidates_orps",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_orp", referencedColumnName="id_orp")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_candidat", referencedColumnName="id_candidat")
     *   }
     * )
     */
    private $idCandidat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCandidat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdOrp(): ?int
    {
        return $this->idOrp;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
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

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setBirthday(?string $birthday): self
    {
        $this->birthday = $birthday;

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
        }

        return $this;
    }

    public function removeIdCandidat(Candidates $idCandidat): self
    {
        if ($this->idCandidat->contains($idCandidat)) {
            $this->idCandidat->removeElement($idCandidat);
        }

        return $this;
    }

}
