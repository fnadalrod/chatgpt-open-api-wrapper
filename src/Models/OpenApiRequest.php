<?php

declare(strict_types=1);

namespace App\Models;

class OpenApiRequest
{
    private string $engine;
    private string $text;
    private ?string $context = null;
    private int $maxTokens;

    public function __construct(OpenApiPreMappingRequest $openApiPreMappingRequest, ?string $context = null)
    {
        $this->engine = $openApiPreMappingRequest->getEngine();
        $this->text = $openApiPreMappingRequest->getText();
        $this->maxTokens = $openApiPreMappingRequest->getMaxTokens();
        $this->context = $openApiPreMappingRequest->getContext();
    }

    public function toArray(): array
    {
        $messages = [];
        $messages[] = [
            'role' => 'user',
            'content' => $this->text
        ];

        if ($this->context !== null) {
            $messages[] = [
                'role' => 'system',
                'content' => $this->context
            ];
        }

        return [
            'model' => $this->engine,
            'messages' => $messages,
            'max_tokens' => $this->maxTokens,
        ];
    }
}