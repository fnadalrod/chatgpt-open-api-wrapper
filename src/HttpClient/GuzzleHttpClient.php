<?php

declare(strict_types=1);

namespace App\HttpClient;

use App\Exceptions\ExceededCurrentQuotaException;
use App\Exceptions\IncorrectApiKeyProvidedException;
use App\Exceptions\InvalidEngineException;
use App\Factories\OpenApiResponseFactory;
use App\Models\OpenApiRequest;
use App\Models\OpenApiResponse;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;

class GuzzleHttpClient implements HttpClientInterface
{
    private ClientInterface $client;

    public function __construct()
    {
        $this->client = new Client([ 'base_uri' => 'https://api.openai.com/v1/', 'timeout' => 2.0, ]);
    }

    /**
     * @throws IncorrectApiKeyProvidedException
     * @throws ExceededCurrentQuotaException
     * @throws InvalidEngineException
     */
    public function prompt(OpenApiRequest $request): OpenApiResponse {
        try {
            $response = $this->client->post(
                'https://api.openai.com/v1/chat/completions',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $request->getToken(),
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'model' => $request->getEngine(),
                        'messages' => [[
                            'role'=> 'user',
                            'content'=> $request->getText()
                        ]],
                        'max_tokens' => $request->getMaxTokens(),
                    ],
                ]
            );

            $body = $response->getBody()->getContents();

            return OpenApiResponseFactory::build($body);
        } catch (ClientException $clientException) {
            IncorrectApiKeyProvidedException::handleExceptionFromClientException($clientException);
            ExceededCurrentQuotaException::handleExceptionFromClientException($clientException);
            InvalidEngineException::handleExceptionFromClientException($clientException);

            throw $clientException;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}