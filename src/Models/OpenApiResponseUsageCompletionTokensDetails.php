<?php

declare(strict_types=1);

namespace App\Models;

class OpenApiResponseUsageCompletionTokensDetails
{
    private int $cachedTokens;
    private int $audioTokens;

    public function getCachedTokens(): int
    {
        return $this->cachedTokens;
    }

    public function setCachedTokens(int $cachedTokens): void
    {
        $this->cachedTokens = $cachedTokens;
    }

    public function getAudioTokens(): int
    {
        return $this->audioTokens;
    }

    public function setAudioTokens(int $audioTokens): void
    {
        $this->audioTokens = $audioTokens;
    }

}