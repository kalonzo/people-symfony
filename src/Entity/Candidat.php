<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidat
 *
 * @ORM\Table(name="candidat")
 * @ORM\Entity
 */
class Candidat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_candidate", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCandidate;

    /**
     * @var int
     *
     * @ORM\Column(name="gender", type="integer", nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="prename", type="string", length=45, nullable=false)
     */
    private $prename;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=45, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=45, nullable=false)
     */
    private $adresse;

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


}
