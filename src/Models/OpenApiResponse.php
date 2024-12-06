<?php

declare(strict_types=1);

namespace App\Models;

use JMS\Serializer\Annotation as Serializer;

class OpenApiResponse
{
    protected string $id;

    protected string $object;
    protected int $created;
    protected string $model;

    /**
     * @var OpenApiResponseChoices[]
     *
     * @Serializer\Type("array<App\Models\OpenApiResponseChoices>")
     */
    protected array $choices = [];

    /**
     * @var OpenApiResponseUsage[]
     *
     * @Serializer\Type("array<App\Models\OpenApiResponseUsage>")
     */
    protected array $usage = [];

    public function getId(): string
    {
        return $this->id;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }

    public function getUsage(): array
    {
        return $this->usage;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setObject(string $object): void
    {
        $this->object = $object;
    }

    public function setCreated(int $created): void
    {
        $this->created = $created;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function setChoices(array $choices): void
    {
        $this->choices = $choices;
    }

    public function setUsage(array $usage): void
    {
        $this->usage = $usage;
    }

    public function getLastResponse(): string
    {
        return \end($this->choices)->getMessage()->getContent();
    }
}