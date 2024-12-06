<?php

declare(strict_types=1);

namespace App\Exceptions;

use GuzzleHttp\Exception\ClientException;

class InvalidEngineException extends \Exception
{
    private const STATUS_CODE = 404;

    private const MESSAGE_DETAILS = 'Invalid engine specified';

    private function __construct(string $messageDetails = self::MESSAGE_DETAILS, int $statusCode = self::STATUS_CODE)
    {
        parent::__construct($messageDetails, $statusCode);
    }

    /**
     * @throws InvalidEngineException
     */
    public static function handleExceptionFromClientException(ClientException $clientException): void {
        if ($clientException->getCode() !== self::STATUS_CODE) {
            return;
        }

        throw new self();
    }
}