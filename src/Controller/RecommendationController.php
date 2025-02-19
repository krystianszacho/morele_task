<?php

declare(strict_types=1);

namespace App\Controller;

use App\Application\RecommendationService;
use App\Domain\RecommendationStrategy;

final class RecommendationController
{
    public function __construct(private RecommendationService $service) {}

    public function handle(RecommendationStrategy $strategy): array
    {
        return $this->service->recommend($strategy);
    }
}
