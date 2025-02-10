<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\MovieFileRepository;
use App\Application\RecommendationService;
use App\Controller\RecommendationController;
use App\Domain\Strategy\RandomRecommendation;
use App\Domain\Strategy\EvenLetterWRecommendation;
use App\Domain\Strategy\MultiWordRecommendation;

$repository = new MovieFileRepository();
$service = new RecommendationService($repository);
$controller = new RecommendationController($service);

$strategies = [
    "Losowe 3 filmy" => new RandomRecommendation(),
    "Filmy na 'W' o parzystej długości" => new EvenLetterWRecommendation(),
    "Filmy z więcej niż 1 słowem" => new MultiWordRecommendation(),
];

echo "=== Rekomendacje filmowe ===\n\n";

array_walk($strategies, function ($strategy, $title) use ($controller) {
    echo "🔹 {$title}:\n";
    $recommendations = $controller->handle($strategy);
    array_map(fn($movie) => print("- $movie\n"), $recommendations);
    echo "\n";
});
