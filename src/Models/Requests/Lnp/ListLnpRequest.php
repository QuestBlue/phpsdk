<?php

namespace questbluesdk\Models\Requests\Lnp;

use questbluesdk\Models\Requests\BaseRequest;

/**
 * Class ListLnpRequest
 * Represents a request model for listing LNP entries.
 */
class ListLnpRequest extends BaseRequest
{
    protected ?string $number2port = null;
    protected ?int $id = null;
    protected int $perPage = 10;
    protected int $page = 1;

    public function setNumber2Port(string $number): self
    {
        $this->number2port = $number;
        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($value) => $value !== null);
    }
}
