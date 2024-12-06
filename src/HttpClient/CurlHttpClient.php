<?php

declare(strict_types=1);

use Models\OpenApiRequest;

class CurlHttpClient implements HttpClientInterface
{
    public function prompt(OpenApiRequest $request): string
    {
        return "";
    }
}