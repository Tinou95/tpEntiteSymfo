<?php

// src/Entity/Response.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponseRepository::class)]
class Response
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\ManyToOne(targetEntity: Topic::class)]
    private $topic;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $author;

    // Getters and setters
    public function getId(): ?int { return $this->id; }
    public function getContent(): ?string { return $this->content; }
    public function setContent(string $content): self { $this->content = $content; return $this; }
    public function getTopic(): ?Topic { return $this->topic; }
    public function setTopic(?Topic $topic): self { $this->topic = $topic; return $this; }
    public function getAuthor(): ?User { return $this->author; }
    public function setAuthor(?User $author): self { $this->author = $author; return $this; }
}
