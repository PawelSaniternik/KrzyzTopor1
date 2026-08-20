<?php

namespace App\Controller\v1;

use App\Dto\GaleriaItemDto;
use App\Dto\PaginatedResponseDto;
use App\Repository\GaleriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class GaleriaController extends AbstractController
{
    #[Route('/api/v1/galeria', name: 'api_galeria_list', methods: ['GET'])]
    public function list(Request $request, GaleriaRepository $repository): JsonResponse
    {
        $page = max(1, $request->query->getInt('page', 1));
        $limit = max(1, $request->query->getInt('limit', 10));

        // 1. Pobranie danych i łącznej liczby rekordów
        $totalItems = $repository->count([]);
        $totalPages = (int) ceil($totalItems / $limit);
        
        $entities = $repository->findBy(
            [],
            ['kolejnosc' => 'ASC'],
            $limit,
            ($page - 1) * $limit
        );

        // 2. Mapowanie encji na GaleriaItemDto
        $itemsDto = array_map(
            fn($galeria) => GaleriaItemDto::fromEntity($galeria),
            $entities
        );

        // 3. Budowa DTO odpowiedzi
        $responseDto = new PaginatedResponseDto(
            page: $page,
            limit: $limit,
            total: $totalItems,
            pages: $totalPages,
            items: $itemsDto
        );

        // 4. Zwrócenie odpowiedzi JSON
        return $this->json($responseDto);
    }
}