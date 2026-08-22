<?php

declare(strict_types=1);

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

        // 1. Fetch data and the total number of records
        $totalItems = $repository->count([]);
        $totalPages = (int) ceil($totalItems / $limit);
        
        $entities = $repository->findBy(
            [],
            ['sequence' => 'ASC'],
            $limit,
            ($page - 1) * $limit
        );

        // 2. Map entities to GaleriaItemDto
        $itemsDto = array_map(
            fn($galeria) => GaleriaItemDto::fromEntity($galeria),
            $entities
        );

        // 3. Build the response DTO
        $responseDto = new PaginatedResponseDto(
            page: $page,
            limit: $limit,
            total: $totalItems,
            pages: $totalPages,
            items: $itemsDto
        );

        // 4. Return the JSON response
        return $this->json($responseDto);
    }
}