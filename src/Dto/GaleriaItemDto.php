<?php

namespace App\Dto;

use App\Entity\Galeria;

readonly class GaleriaItemDto
{
    public function __construct(
        public string $urlZdjecia,
        public int $kolejnosc,
        public string $opublikowane // Format YYYY-MM-DD
    ) {}

    public static function fromEntity(Galeria $galeria): self
    {
        return new self(
            urlZdjecia: $galeria->getUrlZdjecia(),
            kolejnosc: $galeria->getKolejnosc(),
            opublikowane: $galeria->getOpublikowane()?->format('Y-m-d') ?? ''
        );
    }
}