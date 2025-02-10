<?php

declare(strict_types=1);

namespace App\Domain\Strategy;

use App\Domain\RecommendationStrategy;

class MultiWordRecommendation implements RecommendationStrategy
{
    public function getRecommendations(array $movies): array
    {
        return array_filter($movies, fn($title) => str_word_count($title) > 1);
    }
}
