<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CennikRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CennikRepository::class)]
class Cennik
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $valid_from = null;

    #[ORM\Column(length: 255)]
    private ?string $desc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidFrom(): ?\DateTime
    {
        return $this->valid_from;
    }

    public function setValidFrom(\DateTime $valid_from): static
    {
        $this->valid_from = $valid_from;

        return $this;
    }

    public function getDesc(): ?string
    {
        return $this->desc;
    }

    public function setDesc(string $desc): static
    {
        $this->desc = $desc;

        return $this;
    }
}
