<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Engines;

class OpenApiRequest
{
    public const MAX_TOKENS = 50;

    private String $engine;

    private String $token;

    private String $text;

    private int $maxTokens;

    public function __construct(string $token, string $text, string $engine, int $maxTokens = self::MAX_TOKENS)
    {
        $this->engine = $engine;
        $this->token = $token;
        $this->text = $text;
        $this->maxTokens = $maxTokens;
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

}