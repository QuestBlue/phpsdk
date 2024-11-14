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
    }//end setNumber2Port()


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }//end setId()


    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }//end setPerPage()


    public function setPage(int $page): self
    {
        $this->page = $page;
        return $this;
    }//end setPage()


    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($value) => $value !== null);
    }//end toArray()
}//end class
