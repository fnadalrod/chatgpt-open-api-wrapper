<?php

declare(strict_types=1);

namespace App\Models;

class OpenApiResponseUsagePromptTokenDetails
{
    private int $reasoningTokens;

    private int $audioTokens;
    private int $acceptedPredictionTokens;
    private int $rejectedPredictionTokens;

    public function getReasoningTokens(): int
    {
        return $this->reasoningTokens;
    }

    public function setReasoningTokens(int $reasoningTokens): void
    {
        $this->reasoningTokens = $reasoningTokens;
    }

    public function getAudioTokens(): int
    {
        return $this->audioTokens;
    }

    public function setAudioTokens(int $audioTokens): void
    {
        $this->audioTokens = $audioTokens;
    }

    public function getAcceptedPredictionTokens(): int
    {
        return $this->acceptedPredictionTokens;
    }

    public function setAcceptedPredictionTokens(int $acceptedPredictionTokens): void
    {
        $this->acceptedPredictionTokens = $acceptedPredictionTokens;
    }

    public function getRejectedPredictionTokens(): int
    {
        return $this->rejectedPredictionTokens;
    }

    public function setRejectedPredictionTokens(int $rejectedPredictionTokens): void
    {
        $this->rejectedPredictionTokens = $rejectedPredictionTokens;
    }
}