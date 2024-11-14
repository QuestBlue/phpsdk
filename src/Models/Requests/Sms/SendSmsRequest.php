<?php

namespace questbluesdk\Models\Requests\Sms;

use questbluesdk\Models\Requests\BaseRequest;

class SendSmsRequest extends BaseRequest
{
    protected string $didFrom;
    protected string $didTo;
    protected string $msg;
    protected ?string $fpath;
    protected int $version;

    public function __construct(string $didFrom, string $didTo, string $msg, ?string $fpath = null, int $version = 2)
    {
        $this->didFrom = $didFrom;
        $this->didTo = $didTo;
        $this->msg = $msg;
        $this->fpath = $fpath;
        $this->version = $version;
    }

    public function setDidFrom(string $didFrom): self
    {
        $this->didFrom = $didFrom;
        return $this;
    }

    public function setDidTo(string $didTo): self
    {
        $this->didTo = $didTo;
        return $this;
    }

    public function setMsg(string $msg): self
    {
        $this->msg = $msg;
        return $this;
    }

    public function setFpath(?string $fpath): self
    {
        $this->fpath = $fpath;
        return $this;
    }

    public function setVersion(int $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function getEndpoint(): string
    {
        return $this->version === 2 ? 'smsv2' : 'sms';
    }

    public function toArray(): array
    {
        $params = [
            'did' => $this->didFrom,
            'did_to' => $this->didTo,
            'msg' => $this->msg,
        ];

        if ($this->version === 2 && $this->fpath) {
            $params['file_url'] = $this->fpath;
        } elseif ($this->fpath && is_file($this->fpath)) {
            $params['file'] = base64_encode(file_get_contents($this->fpath));
            $params['fname'] = base64_encode(pathinfo($this->fpath, PATHINFO_BASENAME));
        }

        return $params;
    }
}
