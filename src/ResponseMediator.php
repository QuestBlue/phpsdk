<?php

namespace questbluesdk;

use Psr\Http\Message\ResponseInterface;
use questbluesdk\Models\Responses\Error\ErrorResponse;

class ResponseMediator
{
    public static function getContent(ResponseInterface $response): string|ErrorResponse
    {
        $content = $response->getBody()->getContents();

        if (str_contains($content, 'error')) {
            $data = json_decode($content, true);
            return new ErrorResponse($data['error'], 206, $content);
        }

        if (self::isJson($content)) {
            $content = json_encode(json_decode($content), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }

        return $content;
    }

    private static function isJson(string $string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
