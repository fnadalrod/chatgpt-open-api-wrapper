<?php

declare(strict_types=1);

namespace App\Models;

class OpenApiResponseUsage
{
    private int $promptTokens;
    private int $completionTokens;
    private int $totalTokens;
    private OpenApiResponseUsagePromptTokenDetails $promptTokensDetails;
    private OpenApiResponseUsageCompletionTokensDetails $completionTokensDetails;

    public function getPromptTokens(): int
    {
        return $this->promptTokens;
    }

    public function setPromptTokens(int $promptTokens): void
    {
        $this->promptTokens = $promptTokens;
    }

    public function getCompletionTokens(): int
    {
        return $this->completionTokens;
    }

    public function setCompletionTokens(int $completionTokens): void
    {
        $this->completionTokens = $completionTokens;
    }

    public function getTotalTokens(): int
    {
        return $this->totalTokens;
    }

    public function setTotalTokens(int $totalTokens): void
    {
        $this->totalTokens = $totalTokens;
    }

    public function getPromptTokensDetails(): OpenApiResponseUsagePromptTokenDetails
    {
        return $this->promptTokensDetails;
    }

    public function setPromptTokensDetails(OpenApiResponseUsagePromptTokenDetails $promptTokensDetails): void
    {
        $this->promptTokensDetails = $promptTokensDetails;
    }

    public function getCompletionTokensDetails(): OpenApiResponseUsageCompletionTokensDetails
    {
        return $this->completionTokensDetails;
    }

    public function setCompletionTokensDetails(OpenApiResponseUsageCompletionTokensDetails $completionTokensDetails): void
    {
        $this->completionTokensDetails = $completionTokensDetails;
    }
}