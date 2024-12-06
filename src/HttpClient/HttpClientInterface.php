<?php

declare(strict_types=1);

namespace App\HttpClient;

use App\Models\OpenApiRequest;
use App\Models\OpenApiResponse;

interface HttpClientInterface
{
    public function prompt(OpenApiRequest $request): OpenApiResponse;

}