<?php

namespace questbluesdk;

use Symfony\Component\Yaml\Yaml;

/**
 * Class ApiConfig
 * Handles the configuration settings for the API.
 */
class ApiConfig
{
    private bool $debug;
    private array $config;

    /**
     * ApiConfig constructor.
     *
     * @param bool $debug
     */
    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
        $this->config = (new Yaml())->parseFile(__DIR__ . '/../config.yml.example');
    }

    /**
     * Checks if debug mode is enabled.
     *
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug === true;
    }

    /**
     * Gets the base URL for the API.
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        if ($this->isDebug()) {
            return $this->config['questblue']['api']['debug_base_url'];
        } else {
            return $this->config['questblue']['api']['base_url'];
        }
    }

    /**
     * Gets the timeout for the API requests.
     *
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->config['questblue']['api']['timeout'] ?? 45;
    }

    /**
     * Checks if SSL verification is enabled.
     *
     * @return bool
     */
    public function getVerifySsl(): bool
    {
        return $this->config['questblue']['api']['verify_ssl'] ?? true;
    }

    /**
     * Gets the API credentials.
     *
     * @return array
     */
    public function getCredentials(): array
    {
        return [
            'login' => $this->config['questblue']['credentials']['login'] ?? '',
            'password' => $this->config['questblue']['credentials']['password'] ?? '',
            'key' => $this->config['questblue']['credentials']['key'] ?? '',
        ];
    }
}
