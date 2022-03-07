<?php

namespace App\Entity;

use App\Repository\RegimeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegimeRepository::class)
 */
class Regime
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $AlimentsAutorises;

    /**
     * @ORM\Column(type="text")
     */
    private $AlimentsInterdits;

    /**
     * @ORM\Column(type="text")
     */
    private $PetitDejeuner;

    /**
     * @ORM\Column(type="text")
     */
    private $Collation1;

    /**
     * @ORM\Column(type="text")
     */
    private $Dejeuner;

    /**
     * @ORM\Column(type="text")
     */
    private $Collation2;

    /**
     * @ORM\Column(type="text")
     */
    private $Diner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="regimes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): self
    {
        $this->user = $user;
        return $this;
    }



    /**
     * @ORM\Column(type="text")
     */
    private $Conseils;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlimentsAutorises(): ?string
    {
        return $this->AlimentsAutorises;
    }

    public function setAlimentsAutorises(string $AlimentsAutorises): self
    {
        $this->AlimentsAutorises = $AlimentsAutorises;

        return $this;
    }

    public function getAlimentsInterdits(): ?string
    {
        return $this->AlimentsInterdits;
    }

    public function setAlimentsInterdits(string $AlimentsInterdits): self
    {
        $this->AlimentsInterdits = $AlimentsInterdits;

        return $this;
    }

    public function getPetitDejeuner(): ?string
    {
        return $this->PetitDejeuner;
    }

    public function setPetitDejeuner(string $PetitDejeuner): self
    {
        $this->PetitDejeuner = $PetitDejeuner;

        return $this;
    }

    public function getCollation1(): ?string
    {
        return $this->Collation1;
    }

    public function setCollation1(string $Collation1): self
    {
        $this->Collation1 = $Collation1;

        return $this;
    }

    public function getDejeuner(): ?string
    {
        return $this->Dejeuner;
    }

    public function setDejeuner(string $Dejeuner): self
    {
        $this->Dejeuner = $Dejeuner;

        return $this;
    }

    public function getCollation2(): ?string
    {
        return $this->Collation2;
    }

    public function setCollation2(string $Collation2): self
    {
        $this->Collation2 = $Collation2;

        return $this;
    }

    public function getDiner(): ?string
    {
        return $this->Diner;
    }

    public function setDiner(string $Diner): self
    {
        $this->Diner = $Diner;

        return $this;
    }

    public function getConseils(): ?string
    {
        return $this->Conseils;
    }

    public function setConseils(string $Conseils): self
    {
        $this->Conseils = $Conseils;

        return $this;
    }
}
