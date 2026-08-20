<?php

namespace App\Entity;

use App\Repository\GaleriaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GaleriaRepository::class)]
class Galeria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url_zdjecia = null;

    #[ORM\Column]
    private ?int $kolejnosc = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $opublikowane = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlZdjecia(): ?string
    {
        return $this->url_zdjecia;
    }

    public function setUrlZdjecia(string $url_zdjecia): static
    {
        $this->url_zdjecia = $url_zdjecia;

        return $this;
    }

    public function getKolejnosc(): ?int
    {
        return $this->kolejnosc;
    }

    public function setKolejnosc(int $kolejnosc): static
    {
        $this->kolejnosc = $kolejnosc;

        return $this;
    }

    public function getOpublikowane(): ?\DateTime
    {
        return $this->opublikowane;
    }

    public function setOpublikowane(\DateTime $opublikowane): static
    {
        $this->opublikowane = $opublikowane;

        return $this;
    }
}
