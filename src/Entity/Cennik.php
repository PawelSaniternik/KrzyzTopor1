<?php

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
    private ?\DateTime $obowiazuje_od = null;

    #[ORM\Column(length: 255)]
    private ?string $opis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObowiazujeOd(): ?\DateTime
    {
        return $this->obowiazuje_od;
    }

    public function setObowiazujeOd(\DateTime $obowiazuje_od): static
    {
        $this->obowiazuje_od = $obowiazuje_od;

        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->opis;
    }

    public function setOpis(string $opis): static
    {
        $this->opis = $opis;

        return $this;
    }
}
