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
//            $response = $this->client->post(
//                'https://api.openai.com/v1/chat/completions',
//                [
//                    'headers' => [
//                        'Authorization' => 'Bearer ' . $request->getToken(),
//                        'Content-Type' => 'application/json',
//                    ],
//                    'json' => [
//                        'model' => $request->getEngine(),
//                        'messages' => [[
//                            'role'=> 'user',
//                            'content'=> $request->getText()
//                        ]],
//                        'max_tokens' => $request->getMaxTokens(),
//                    ],
//                ]
//            );
//
//            $body = $response->getBody()->getContents();
            $body = '{
  "id": "chatcmpl-Ab954JzXnzdOVj17hT1V4ZRXx2kCl",
  "object": "chat.completion",
  "created": 1733416406,
  "model": "gpt-3.5-turbo-0125",
  "choices": [
    {
      "index": 0,
      "message": {
        "role": "assistant",
        "content": "As an AI, I am based on software algorithms and programming, so I am always \"working\" in the sense that I am ready to respond to any queries or tasks given to me. If you are referring to a specific function or task, please",
        "refusal": null
      },
      "logprobs": null,
      "finish_reason": "length"
    }
  ],
  "usage": {
    "prompt_tokens": 11,
    "completion_tokens": 50,
    "total_tokens": 61,
    "prompt_tokens_details": {
      "cached_tokens": 0,
      "audio_tokens": 0
    },
    "completion_tokens_details": {
      "reasoning_tokens": 0,
      "audio_tokens": 0,
      "accepted_prediction_tokens": 0,
      "rejected_prediction_tokens": 0
    }
  },
  "system_fingerprint": null
}';

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