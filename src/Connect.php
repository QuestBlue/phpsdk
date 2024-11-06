<?php

namespace questbluesdk;

use JMS\Serializer\Serializer;
use questbluesdk\Models\ErrorResponse;
use GuzzleHttp\Client;
use JMS\Serializer\SerializerBuilder;

class Connect
{
    private $login;
    private $password;
    private $key;
    private $debug;
    private $client;

    public Serializer $serializer;

    public function __construct($debug = false){
        $this->debug = $debug;

        $this->client = new Client([
            'base_uri' => $this->debug ? 'https://api2dev.questblue.com/' : 'https://api.questblue.com/',
            'timeout' => 45,
            'verify' => false
        ]);

        $this->serializer = SerializerBuilder::create()->build();
    }
    
    public function init($login, $password, $key)
    {
        $this->login = $login; // Your account username or API username
        $this->password = $password; // Your account password or API password
        $this->key = $key; // Your API private key
    }

    public function query($request, $params = [], $method = 'GET') 
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Security-Key' => $this->key
        ];

        $options = [
            'headers' => $headers,
            'auth' => [
                $this->login,
                $this->password
            ],
        ];

        if (!empty($params)) {
            $options['json'] = $params;
        }

        if(is_array($params) && count($params) > 0) {
            $params = json_encode($params);
        }

        try {
            $response = $this->client->request($method, $request, $options);
            $responseData = $response->getBody()->getContents();

            if ($this->isErrorResponse($responseData)) {
                return $this->getErrorResponse($responseData);
            }

            return $response->getBody()->getContents();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseData = $e->getResponse()->getBody()->getContents();

            if ($e->hasResponse()) {
                if ($this->isErrorResponse($responseData)) {
                    return $this->getErrorResponse($responseData);
                }

                return $responseData;
            }

            return $e->getMessage();
        }
    }

    private function isErrorResponse(string $response): bool
    {
        return str_contains($response, 'error');
    }

    private function getErrorResponse(string $response): ErrorResponse
    {
        return $this->serializer->deserialize($response, ErrorResponse::class, 'json');
    }
}
