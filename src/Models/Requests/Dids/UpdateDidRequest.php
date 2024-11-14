<?php

namespace questbluesdk\Models\Requests\Dids;

use questbluesdk\Models\Requests\BaseRequest;

class UpdateDidRequest extends BaseRequest
{
    protected ?string $did = null;

    protected ?string $sname = null;

    protected ?string $note = null;

    protected ?string $pin = null;

    protected ?string $post2url = null;

    protected ?string $ataMacAddress = null;


    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }//end setDid()


    public function setSname(string $sname): self
    {
        $this->sname = $sname;
        return $this;
    }//end setSname()


    public function setNote(string $note): self
    {
        $this->note = $note;
        return $this;
    }//end setNote()


    public function setPin(string $pin): self
    {
        $this->pin = $pin;
        return $this;
    }//end setPin()


    public function setPost2url(string $post2url): self
    {
        $this->post2url = $post2url;
        return $this;
    }//end setPost2url()


    public function setAtaMacAddress(string $ataMacAddress): self
    {
        $this->ataMacAddress = $ataMacAddress;
        return $this;
    }//end setAtaMacAddress()


    public function toArray(): array
    {
        return array_filter(
            [
                'did'             => $this->did,
                'sname'           => $this->sname,
                'note'            => $this->note,
                'pin'             => $this->pin,
                'post2url'        => $this->post2url,
                'ata_mac_address' => $this->ataMacAddress,
            ],
            fn($value) => !is_null($value)
        );
    }//end toArray()
}//end class
