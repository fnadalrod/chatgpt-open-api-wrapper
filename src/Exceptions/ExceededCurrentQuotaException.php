<?php

declare(strict_types=1);

namespace App\Exceptions;

use GuzzleHttp\Exception\ClientException;

class ExceededCurrentQuotaException extends \Exception
{
    private const STATUS_CODE = 429;

    private const MESSAGE_DETAILS = 'You exceeded your current quota';

    private function __construct(string $messageDetails = self::MESSAGE_DETAILS, int $statusCode = self::STATUS_CODE)
    {
        parent::__construct($messageDetails, $statusCode);
    }

    /**
     * @throws IncorrectApiKeyProvidedException
     */
    public static function handleExceptionFromClientException(ClientException $clientException): void {
        if ($clientException->getCode() !== self::STATUS_CODE) {
            return;
        }

        throw new self();
    }
}