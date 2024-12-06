<?php

declare(strict_types=1);

namespace App\Models;

class OpenApiResponseMessage
{
    private string $role;
    private string $content;
    private ?string $refusal;

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getRefusal(): ?string
    {
        return $this->refusal;
    }

    public function setRefusal(?string $refusal): void
    {
        $this->refusal = $refusal;
    }
}