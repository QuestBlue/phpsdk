<?php

namespace questbluesdk\Models\Requests;

/**
 * Class BaseRequest
 * Provides common functionality for all request models.
 */
abstract class BaseRequest
{
    /**
     * Set multiple parameters at once using an associative array.
     *
     * @param  array $params
     * @return self
     */
    public function withParameters(array $params): self
    {
        foreach ($params as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
        return $this;
    }

    /**
     * Convert the request object to an array for the API call.
     *
     * @return array
     */
    abstract public function toArray(): array;
}
