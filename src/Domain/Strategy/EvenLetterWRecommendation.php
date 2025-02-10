<?php

declare(strict_types=1);

namespace App\Domain\Strategy;

use App\Domain\RecommendationStrategy;

class EvenLetterWRecommendation implements RecommendationStrategy
{
    public function getRecommendations(array $movies): array
    {
        return array_filter($movies, fn($title) => str_starts_with($title, 'W') && mb_strlen($title) % 2 === 0);
    }
}
