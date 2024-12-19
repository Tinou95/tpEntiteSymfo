<?php

// src/Entity/User.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 100)]
    private $firstName;

    #[ORM\Column(type: 'string', length: 100)]
    private $lastName;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    // Getters and setters
    public function getId(): ?int { return $this->id; }
    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }
    public function getPassword(): ?string { return $this->password; }
    public function setPassword(string $password): self { $this->password = $password; return $this; }
    public function getFirstName(): ?string { return $this->firstName; }
    public function setFirstName(string $firstName): self { $this->firstName = $firstName; return $this; }
    public function getLastName(): ?string { return $this->lastName; }
    public function setLastName(string $lastName): self { $this->lastName = $lastName; return $this; }
    public function getRoles(): array { return $this->roles; }
    public function setRoles(array $roles): self { $this->roles = $roles; return $this; }

    // Méthode obligatoire de UserInterface
    public function getUserIdentifier(): string
    {
        return (string) $this->email; // Utilisez l'email comme identifiant unique
    }

    public function eraseCredentials(): void
    {
        // Effacez les données sensibles ici si nécessaire
    }
}
