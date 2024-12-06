<?php

declare(strict_types=1);

namespace App\HttpClient;

use App\Enums\Engines;
use App\Models\OpenApiRequest;
use App\Models\OpenApiResponse;

class OpenApiClient implements OpenApiClientInterface
{
    private HttpClientInterface $httpClient;

    private String $apiKey;

    private String $engine;

    public function __construct(array $config = []) {
        if (empty($config['http_client']) || $config['http_client'] === 'guzzle') {
            $this->httpClient = new GuzzleHttpClient();
        }

        $this->apiKey = $config['api_key'];
        $this->engine = Engines::GPT_3_5_TURBO;

        if (isset($config['engine'])) {
            $this->engine = $config['engine'];
        }
    }

    public function prompt(string $text): OpenApiResponse
    {
        $request = new OpenApiRequest(
            $this->apiKey,
            $text,
            $this->engine
        );

        return $this->httpClient->prompt($request);
    }
}