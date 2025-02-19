<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\MovieRepository;

final class MovieFileRepository implements MovieRepository
{
    public function getAllMovies(): array
    {
        try {
            $movies = require __DIR__ . '/../../data/movies.php';
            if (!is_array($movies)) {
                throw new \RuntimeException('movies.php nie zwrócił poprawnej tablicy filmów.');
            }

            return $movies;
        } catch (\Exception $e) {
            throw new \RuntimeException('Błąd podczas ładowania filmów: ' . $e->getMessage());
        }
    }
}
