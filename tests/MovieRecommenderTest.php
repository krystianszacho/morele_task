<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\MovieFileRepository;
use App\Application\RecommendationService;
use App\Controller\RecommendationController;
use App\Domain\Strategy\RandomRecommendation;
use App\Domain\Strategy\EvenLetterWRecommendation;
use App\Domain\Strategy\MultiWordRecommendation;

class MovieRecommenderTest extends TestCase
{
    private array $movies;
    private RecommendationController $controller;

    protected function setUp(): void
    {
        $repository = new MovieFileRepository();
        $service = new RecommendationService($repository);
        $this->controller = new RecommendationController($service);
        $this->movies = $repository->getAllMovies();
    }

    public function testRandomRecommendation()
    {
        $recommendations = $this->controller->handle(new RandomRecommendation());

        $this->assertCount(3, $recommendations);
        $this->assertContainsOnly('string', $recommendations);
    }

    public function testEvenLetterWRecommendation()
    {
        $recommendations = $this->controller->handle(new EvenLetterWRecommendation());

        array_map(function ($title) {
            $this->assertTrue(str_starts_with($title, 'W'));
            $this->assertTrue(mb_strlen(str_replace(' ', '', $title)) % 2 === 0);
        }, $recommendations);
    }

    public function testMultiWordRecommendation()
    {
        $recommendations = $this->controller->handle(new MultiWordRecommendation());

        array_map(fn($title) => $this->assertTrue(str_word_count($title) > 2), $recommendations);
    }
}
