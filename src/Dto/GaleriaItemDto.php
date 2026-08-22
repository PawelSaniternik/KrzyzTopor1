<?php

declare(strict_types=1);


namespace App\Dto;

use App\Entity\Galeria;

readonly class GaleriaItemDto
{
    public function __construct(
        public string $pictureUrl,
        public int $sequence,
        public string $publishedOn // Format YYYY-MM-DD
    ) {}

    public static function fromEntity(Galeria $galeria): self
    {
        return new self(
            pictureUrl: $galeria->getPictureUrl(),
            sequence: $galeria->getSequence(),
            publishedOn: $galeria->getPublishedOn()?->format('Y-m-d') ?? ''
        );
    }
}