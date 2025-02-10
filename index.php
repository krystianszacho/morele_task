<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\MovieFileRepository;
use App\Application\RecommendationService;
use App\Controller\RecommendationController;
use App\Domain\Strategy\RandomRecommendation;

$repository = new MovieFileRepository();
$service = new RecommendationService($repository);
$controller = new RecommendationController($service);

$recommendations = $controller->handle(new RandomRecommendation());

array_map(fn($movie) => print("- $movie\n"), $recommendations);
