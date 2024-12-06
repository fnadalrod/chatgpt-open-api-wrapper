<?php

declare(strict_types=1);

namespace App\Models;

class OpenApiResponseChoices
{
    private int $index;

    private OpenApiResponseMessage $message;
    private String $finishReason;

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getMessage(): OpenApiResponseMessage
    {
        return $this->message;
    }

    public function getFinishReason(): string
    {
        return $this->finishReason;
    }

    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    public function setMessage(OpenApiResponseMessage $message): void
    {
        $this->message = $message;
    }

    public function setFinishReason(string $finishReason): void
    {
        $this->finishReason = $finishReason;
    }
}