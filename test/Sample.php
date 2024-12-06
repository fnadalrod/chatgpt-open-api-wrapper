<?php

require __DIR__ . '/../vendor/autoload.php';

use App\HttpClient\OpenApiClient;

$config = [
    "http_client" => "guzzle",
    "api_key" => "****",
    "engine" => "gpt-3.5-turbo"
];

$openApiClient = new OpenApiClient($config);
$openApiResponse = $openApiClient->prompt('Is it working?');

echo $openApiResponse->getLastResponse();
