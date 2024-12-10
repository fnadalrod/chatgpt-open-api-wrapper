<?php

declare(strict_types=1);

namespace App\HttpClient;

use App\Models\OpenApiPreMappingRequest;
use App\Models\OpenApiResponse;

interface HttpClientInterface
{
    public function prompt(OpenApiPreMappingRequest $request): OpenApiResponse;

}