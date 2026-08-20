<?php

namespace App\Dto;

readonly class PaginatedResponseDto
{
    /**
     * @param array<mixed> $items
     */
    public function __construct(
        public int $page,
        public int $limit,
        public int $total,
        public int $pages,
        public array $items
    ) {}
}