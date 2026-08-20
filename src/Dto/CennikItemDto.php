<?php

namespace App\Dto;

use App\Entity\Cennik;

readonly class CennikItemDto
{
    public function __construct(
        public string $obowiazuje_od, // Format YYYY-MM-DD
        public string $opis
    ) {}

    public static function fromEntity(Cennik $cennik): self
    {
        return new self(
            obowiazuje_od: $cennik->getObowiazujeOd()?->format('Y-m-d') ?? '',
            opis: $cennik->getOpis()
        );
    }
}