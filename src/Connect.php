<?php

namespace questbluesdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use questbluesdk\Exceptions\ClientErrorException;
use questbluesdk\Exceptions\ServerErrorException;
use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Connect
 * Manages API connections, authentication, request handling, and error responses.
 */
class Connect
{
    private string $login;
    private string $password;
    private string $key;
    protected bool $debug;
    private Client $client;
    public Serializer $serializer;

    /**
     * Constructor initializes the HTTP client and serializer.
     *
     * @param bool $debug Toggle for debug mode to use development base URI.
     */
    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
        $this->client = new Client([
            'base_uri' => $this->debug ? 'https://api2dev.questblue.com/' : 'https://api.questblue.com/',
            'timeout' => 45,
            'verify' => false
        ]);
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * Initialize API credentials.
     *
     * @param string $login API username.
     * @param string $password API password.
     * @param string $key API private key.
     */
    public function init(string $login, string $password, string $key): void
    {
        $this->login = $login;
        $this->password = $password;
        $this->key = $key;
    }

    /**
     * Execute an HTTP request to the specified endpoint.
     *
     * @param string $endpoint API endpoint to query.
     * @param array $params Parameters to send with the request.
     * @param string $method HTTP method to use (e.g., 'GET', 'POST').
     * @return string|ErrorResponse JSON response data or an ErrorResponse on failure.
     */
    public function query(string $endpoint, array $params = [], string $method = 'GET'): string|ErrorResponse
    {
        try {
            $response = $this->client->request($method, $endpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Security-Key' => $this->key
                ],
                'auth' => [
                    $this->login,
                    $this->password
                ],
                'json' => $params
            ]);
            $responseData = $response->getBody()->getContents();

            if ($this->isErrorResponse($responseData)) {
                return $this->getErrorResponse($responseData, $response->getStatusCode());
            }

            return $responseData;
        } catch (RequestException $e) {
            return $this->handleRequestException($e);
        }
    }

    /**
     * Handle the API response, optionally deserializing it into a specified class.
     *
     * @param mixed $response The raw response or an ErrorResponse.
     * @param string|null $deserializedClass Class to deserialize into if applicable.
     * @return mixed Returns the deserialized class instance, ErrorResponse, or true.
     */
    public function handleResponse(mixed $response, string $deserializedClass = null): mixed
    {
        if ($response instanceof ErrorResponse) {
            return $response;
        }

        if ($deserializedClass) {
            return $this->serializer->deserialize($response, $deserializedClass, 'json');
        }

        return true;
    }

    /**
     * Check if the response contains an error.
     *
     * @param string $response The response to check.
     * @return bool True if an error is detected, otherwise false.
     */
    private function isErrorResponse(string $response): bool
    {
        return str_contains($response, 'error');
    }

    /**
     * Deserialize and return an ErrorResponse from a JSON response.
     *
     * @param string $response JSON response containing error details.
     * @return ErrorResponse Deserialized ErrorResponse object.
     */
    private function getErrorResponse(string $response, int $statusCode = null): ErrorResponse
    {
        $error = $this->serializer->deserialize($response, ErrorResponse::class, 'json');
        $error->statusCode = $statusCode;
        return $error;
    }

    /**
     * Handle exceptions during the request and parse error responses if available.
     *
     * @param RequestException $e Exception thrown during the request.
     * @return string|ErrorResponse Parsed error response or exception message.
     */
    private function handleRequestException(RequestException $e): string|ErrorResponse
    {
        $response = $e->getResponse();
        if ($response) {
            $responseData = $response->getBody()->getContents();
            if ($this->isErrorResponse($responseData)) {
                return $this->getErrorResponse($responseData, $response->getStatusCode());
            }
            return $responseData;
        }

        return new ErrorResponse($e->getMessage(), 'Request failed without response', $e->getCode());
    }
}
