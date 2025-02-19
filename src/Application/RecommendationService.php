<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\MovieRepository;
use App\Domain\RecommendationStrategy;

final class RecommendationService
{
    public function __construct(private MovieRepository $repository) {}

    public function recommend(RecommendationStrategy $strategy): array
    {
        return $strategy->getRecommendations($this->repository->getAllMovies());
    }
}
