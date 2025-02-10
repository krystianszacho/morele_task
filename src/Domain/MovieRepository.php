<?php

declare(strict_types=1);

namespace App\Domain;

interface MovieRepository
{
    public function getAllMovies(): array;
}
