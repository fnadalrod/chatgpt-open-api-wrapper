<?php

declare(strict_types=1);

namespace App\Factories;

use App\Models\OpenApiResponse;
use App\Models\OpenApiResponseChoices;
use App\Models\OpenApiResponseMessage;
use App\Models\OpenApiResponseUsage;
use App\Models\OpenApiResponseUsageCompletionTokensDetails;
use App\Models\OpenApiResponseUsagePromptTokenDetails;

class OpenApiResponseFactory
{
    public static function build(string $openApiResponseBody): OpenApiResponse
    {
        $openApiResponseBodyArray = \json_decode($openApiResponseBody, true);

        $openApiResponse = new OpenApiResponse();
        $openApiResponse->setId($openApiResponseBodyArray['id']) ?? null;
        $openApiResponse->setObject($openApiResponseBodyArray['object']) ?? null;
        $openApiResponse->setCreated($openApiResponseBodyArray['created']) ?? null;
        $openApiResponse->setModel($openApiResponseBodyArray['model'] ?? null);

        $choices = [];
        foreach ($openApiResponseBodyArray['choices'] as $choiceData) {
            $choice = new OpenApiResponseChoices();
            $choice->setIndex($choiceData['index']);

            $messageData = $choiceData['message'] ?? null;
            $message = new OpenApiResponseMessage();
            $message->setRole($messageData['role'] ?? null);
            $message->setContent($messageData['content'] ?? null);
            $message->setRefusal($messageData['refusal'] ?? null);
            $choice->setMessage($message);

            $choice->setFinishReason($choiceData['finish_reason'] ?? null);

            $choices[] = $choice;
        }

        $openApiResponse->setChoices($choices);

        if ($openApiResponseBodyArray['usage'] !== null) {
            $usage = new OpenApiResponseUsage();
            $usage->setPromptTokens($openApiResponseBodyArray['usage']['prompt_tokens'] ?? 0);
            $usage->setCompletionTokens($openApiResponseBodyArray['usage']['completion_tokens'] ?? 0);
            $usage->setTotalTokens($openApiResponseBodyArray['usage']['total_tokens'] ?? 0);

            $promptDetails = new OpenApiResponseUsagePromptTokenDetails();
            $promptDetails->setAudioTokens($openApiResponseBodyArray['usage']['completion_tokens_details']['audio_tokens'] ?? 0);
            $promptDetails->setReasoningTokens($openApiResponseBodyArray['usage']['completion_tokens_details']['reasoning_tokens'] ?? 0);
            $promptDetails->setAcceptedPredictionTokens($openApiResponseBodyArray['usage']['completion_tokens_details']['accepted_prediction_tokens'] ?? 0);
            $promptDetails->setRejectedPredictionTokens($openApiResponseBodyArray['usage']['completion_tokens_details']['rejected_prediction_tokens'] ?? 0);

            $usage->setPromptTokensDetails($promptDetails);

            $completionTokenDetails = new OpenApiResponseUsageCompletionTokensDetails();
            $completionTokenDetails->setCachedTokens($openApiResponseBodyArray['usage']['prompt_tokens_details']['cached_tokens'] ?? 0);
            $completionTokenDetails->setAudioTokens($openApiResponseBodyArray['usage']['prompt_tokens_details']['audio_tokens'] ?? 0);
            $usage->setCompletionTokensDetails($completionTokenDetails);

            $openApiResponse->setUsage([$usage]);
        }

        return $openApiResponse;
    }

}