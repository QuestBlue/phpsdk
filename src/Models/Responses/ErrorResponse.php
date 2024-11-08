<?php

namespace questbluesdk\Models\Responses;

/**
 * Class ErrorResponse
 * Represents an error response from the API with details about the error.
 */
class ErrorResponse
{
    /**
     * @var string The main error message or code.
     */
    public string $error;

    /**
     * @var string|null Detailed description of the error (if available).
     */
    public ?string $message = null;

    /**
     * @var int|null HTTP status code associated with the error (if applicable).
     */
    public ?int $statusCode = null;

    /**
     * Constructor to initialize error response properties.
     *
     * @param string $error The main error message or code.
     * @param string|null $message Optional detailed error message.
     * @param int|null $statusCode Optional HTTP status code.
     */
    public function __construct(string $error, ?string $message = null, ?int $statusCode = null)
    {
        $this->error = $error;
        $this->message = $message;
        $this->statusCode = $statusCode;
    }

    /**
     * Return a formatted error response as a string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            "Error: %s\nMessage: %s\nStatus Code: %s",
            $this->error,
            $this->message ?? 'N/A',
            $this->statusCode ?? 'N/A'
        );
    }
}
