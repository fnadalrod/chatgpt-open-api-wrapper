<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Enums\Engines;
use App\HttpClient\OpenApiClient;

$config = [
    "api_key" => "****",
    "engine" => Engines::GPT_3_5_TURBO
];

$openApiClient = new OpenApiClient($config);
$openApiResponse = $openApiClient->prompt('Is it working?', 'You can only respond with yes or no');

echo $openApiResponse->getLastResponse();
