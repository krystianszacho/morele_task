<?php

declare(strict_types=1);

namespace App\Domain;

interface RecommendationStrategy
{
    public function getRecommendations(array $movies): array;
}
