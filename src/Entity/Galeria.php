<?php
declare(strict_types=1);

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
    private ?string $picture_url = null;

    #[ORM\Column]
    private ?int $sequence = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $publishedon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPictureUrl(): ?string
    {
        return $this->picture_url;
    }

    public function setPictureUrl(string $picture_url): static
    {
        $this->picture_url = $picture_url;

        return $this;
    }

    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    public function setSequence(int $sequence): static
    {
        $this->sequence = $sequence;

        return $this;
    }

    public function getPublishedon(): ?\DateTime
    {
        return $this->publishedon;
    }

    public function setPublishedon(\DateTime $publishedon): static
    {
        $this->publishedon = $publishedon;

        return $this;
    }
}
