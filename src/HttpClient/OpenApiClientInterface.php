<?php

declare(strict_types=1);

namespace App\HttpClient;

use App\Models\OpenApiResponse;

interface OpenApiClientInterface
{
    public function prompt(string $text): OpenApiResponse;
}