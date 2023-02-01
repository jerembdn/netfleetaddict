<?php

namespace App\Entity;

use App\Repository\SheetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SheetRepository::class)]
class Sheet
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $name = null;

  #[ORM\Column(type: 'text')]
  private ?string $synopsis = null;

  #[ORM\Column(length: 255)]
  private ?string $type = null;

  #[ORM\Column(type: 'datetime', default: 'CURRENT_TIMESTAMP')]
  private ?\DateTimeInterface $createdAt = null;

  public function __construct()
  {
  }

  public function getId(): ?int
  {
    return $this->id;
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

  public function getSynopsis(): ?string
  {
    return $this->synopsis;
  }

  public function setSynopsis(string $synopsis): self
  {
    $this->synopsis = $synopsis;

    return $this;
  }

  public function getType(): ?string
  {
    return $this->type;
  }

  public function setType(string $type): self
  {
    $this->type = $type;

    return $this;
  }

  public function getCreatedAt(): ?\DateTimeInterface
  {
    return $this->createdAt;
  }

  public function setCreatedAt(\DateTimeInterface $createdAt): self
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  public function __toString()
  {
    return $this->name;
  }
}