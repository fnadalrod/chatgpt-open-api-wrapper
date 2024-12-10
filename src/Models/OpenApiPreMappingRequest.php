<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Engines;

class OpenApiPreMappingRequest
{
    public const MAX_TOKENS = 50;

    private String $engine;

    private String $token;

    private String $text;

    private int $maxTokens;

    private ?string $context;

    public function __construct(string $token, string $text, string $engine = Engines::GPT_3_5_TURBO, int $maxTokens = self::MAX_TOKENS, ?string $context = null)
    {
        $this->engine = $engine;
        $this->token = $token;
        $this->text = $text;
        $this->maxTokens = $maxTokens;
        $this->context = $context;
    }

    public function getEngine(): string
    {
        return $this->engine;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getMaxTokens(): int
    {
        return $this->maxTokens;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }
}