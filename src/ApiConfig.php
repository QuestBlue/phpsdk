<?php

namespace questbluesdk;

use Symfony\Component\Yaml\Yaml;

class ApiConfig
{
    private bool $debug;
    private array $config;

    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
        $this->config = (new Yaml())->parseFile(dirname(__DIR__) . '/config.yml.example');
    }

    public function isDebug(): bool
    {
        return $this->debug;
    }

    public function getBaseUrl(): string
    {
        return $this->isDebug() ? $this->config['questblue']['api']['debug_base_url'] : $this->config['questblue']['api']['base_url'];
    }

    public function getTimeout(): int
    {
        return $this->config['questblue']['api']['timeout'] ?? 45;
    }

    public function getVerifySsl(): bool
    {
        return $this->config['questblue']['api']['verify_ssl'] ?? true;
    }

    public function getCredentials(): array
    {
        return [
            'login' => $this->config['questblue']['credentials']['login'] ?? '',
            'password' => $this->config['questblue']['credentials']['password'] ?? '',
            'key' => $this->config['questblue']['credentials']['key'] ?? ''
        ];
    }
}