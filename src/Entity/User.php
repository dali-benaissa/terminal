<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $phonenumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wejhou;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Exercice", mappedBy="user")
     */
    private $exercices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Regime", mappedBy="user")
     */
    private $regimes;

    /**
     * @return Collection|Regime[]
     */
    public function getRegimes(): Collection
    {
        return $this->regimes;
    }

    /**
     * @param mixed $regimes
     */
    public function setRegimes($regimes): void
    {
        $this->regimes = $regimes;
    }


    public function __construct()
    {
        $this->exercices = new ArrayCollection();
        $this->regimes =new ArrayCollection();
    }

    /**
     * @return Collection|Exercice[]
     */
    public function getExercices(): Collection
    {
        return $this->exercices;
    }

    /**
     * @param mixed $exercices
     */
    public function setExercices($exercices): void
    {
        $this->exercices = $exercices;
    }


    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
    if(empty($roles)){
        $roles[] = ['ROLE_USER'];
    }
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {

        $this->roles =  $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(?string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getWejhou(): ?string
    {
        return $this->wejhou;
    }

    public function setWejhou(?string $wejhou): self
    {
        $this->wejhou = $wejhou;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }
}
