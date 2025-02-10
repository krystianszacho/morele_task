<?php

declare(strict_types=1);

namespace App\Domain\Strategy;

use App\Domain\RecommendationStrategy;

class RandomRecommendation implements RecommendationStrategy
{
    public function getRecommendations(array $movies): array
    {
        return array_slice(shuffle($movies) ? $movies : [], 0, 3);
    }
}
