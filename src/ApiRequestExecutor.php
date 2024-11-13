<?php

namespace questbluesdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Psr\Http\Message\ResponseInterface;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use Symfony\Component\Yaml\Yaml;

/**
 * Class ApiRequestExecutor
 * Provides HTTP methods to interact with the API using GET, POST, PUT, PATCH, DELETE, and HEAD requests.
 */
class ApiRequestExecutor
{
    private string $login;
    private string $password;
    private string $key;
    protected bool $debug;
    protected Client $client;
    public Serializer $serializer;

    public function __construct(bool $debug = false)
    {
        $config = Yaml::parseFile(dirname(__DIR__) . '/config.yml.example');

        $this->debug = $config['questblue']['options']['debug'] ?? $debug;
        $baseUrl = $this->debug ? $config['questblue']['api']['debug_base_url'] : $config['questblue']['api']['base_url'];
        $timeout = $config['questblue']['api']['timeout'] ?? 45;
        $verifySsl = $config['questblue']['api']['verify_ssl'] ?? true;
        $login = $config['questblue']['credentials']['login'] ?? '';
        $password = $config['questblue']['credentials']['password'] ?? '';
        $key = $config['questblue']['credentials']['key'] ?? '';

        $this->client = new Client([
            'base_uri' => $baseUrl,
            'timeout' => $timeout,
            'verify' => $verifySsl,
        ]);

        $this->serializer = SerializerBuilder::create()->build();

        $this->connect($login, $password, $key);
    }

    public function connect(string $login, string $password, string $key): self
    {
        $this->login = $login;
        $this->password = $password;
        $this->key = $key;
        return $this;
    }

    protected function get(string $path, array $parameters = [], array $headers = []): string|ErrorResponse
    {
        return $this->request('GET', $path, $parameters, $headers);
    }

    protected function post(string $path, array $parameters = [], array $headers = []): string|ErrorResponse
    {
        return $this->request('POST', $path, $parameters, $headers);
    }

    protected function put(string $path, array $parameters = [], array $headers = []): string|ErrorResponse
    {
        return $this->request('PUT', $path, $parameters, $headers);
    }

    protected function patch(string $path, array $parameters = [], array $headers = []): string|ErrorResponse
    {
        return $this->request('PATCH', $path, $parameters, $headers);
    }

    protected function delete(string $path, array $parameters = [], array $headers = []): string|ErrorResponse
    {
        return $this->request('DELETE', $path, $parameters, $headers);
    }

    protected function head(string $path, array $parameters = [], array $headers = []): string|ErrorResponse
    {
        return $this->request('HEAD', $path, $parameters, $headers);
    }

    private function request(string $method, string $path, array $parameters = [], array $headers = []): string|ErrorResponse
    {
        try {
            $options = [
                'headers' => array_merge($headers, [
                    'Content-Type' => 'application/json',
                    'Security-Key' => $this->key,
                ]),
                'auth' => [$this->login, $this->password],
            ];

            if (!empty($parameters)) {
                if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'])) {
                    $options['json'] = $parameters;
                } else {
                    $path .= '?' . http_build_query($parameters, '', '&', PHP_QUERY_RFC3986);
                }
            }

            $response = $this->client->request($method, $path, $options);

            return ResponseMediator::getContent($response);
        } catch (RequestException $e) {
            return $this->handleRequestException($e);
        }
    }

    public function parseResponse(mixed $response, string $deserializedClass = null): mixed
    {
        if ($response instanceof ErrorResponse) {
            return $response;
        }

        if ($response instanceof ResponseInterface) {
            $content = (string) $response->getBody();
        } else {
            $content = $response;
        }

        if ($deserializedClass) {
            try {
                return $this->serializer->deserialize($content, $deserializedClass, 'json');
            } catch (\Exception $e) {
                return ErrorResponse::fromDeserializationError($content);
            }
        }

        return true;
    }

    private function handleRequestException(RequestException $e): ErrorResponse
    {
        $response = $e->getResponse();
        $statusCode = $response ? $response->getStatusCode() : 500;
        $message = $response ? $response->getBody()->getContents() : $e->getMessage();

        return new ErrorResponse(
            message: $message,
            statusCode: $statusCode,
            details: $response ? (string) $response->getBody() : 'No response body'
        );
    }
}
