<?php

namespace questbluesdk\Models\Responses\Error;

use questbluesdk\Models\Responses\BaseResponse;

class ErrorResponse extends BaseResponse
{
    public ?string $message = null;
    public ?int $statusCode = null;
    public ?string $details = null;

    public function __construct(?string $message = null, ?int $statusCode = null, ?string $details = null)
    {
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->details = $details;
    }

    public static function fromDeserializationError(string $rawResponse): self
    {
        $lastError = json_last_error();
        $errorMessage = 'Deserialization error: ' . json_last_error_msg();

        $details = sprintf(
            "An error occurred while decoding the response. Last JSON error code: %d.\nRaw Response: %s",
            $lastError,
            $rawResponse
        );

        return new self($errorMessage, 500, $details);
    }

    public function __toString(): string
    {
        return sprintf(
            "Message: %s\nStatus Code: %s\nDetails: %s",
            $this->message ?? 'N/A',
            $this->statusCode ?? 'N/A',
            $this->details ?? 'N/A'
        );
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}
