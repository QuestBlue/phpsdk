<?php

namespace questbluesdk\Models\Requests\Sms;

use questbluesdk\Models\Requests\BaseRequest;

class UpdateSmsConfigV1Request extends BaseRequest
{
    protected string $did;

    protected string $smsMode;

    protected ?string $forwardToEmail = null;

    protected ?string $xmppName = null;

    protected ?string $xmppPasswd = null;

    protected ?string $postToUrl = null;

    protected ?string $postToUrlMethod = null;

    protected ?string $chatEmail = null;

    protected ?string $chatPassword = null;


    public function __construct(
        string $did,
        string $smsMode,
        ?string $forwardToEmail = null,
        ?string $xmppName = null,
        ?string $xmppPasswd = null,
        ?string $postToUrl = null,
        ?string $postToUrlMethod = null,
        ?string $chatEmail = null,
        ?string $chatPassword = null
    ) {
        $this->did             = $did;
        $this->smsMode         = $smsMode;
        $this->forwardToEmail  = $forwardToEmail;
        $this->xmppName        = $xmppName;
        $this->xmppPasswd      = $xmppPasswd;
        $this->postToUrl       = $postToUrl;
        $this->postToUrlMethod = $postToUrlMethod;
        $this->chatEmail       = $chatEmail;
        $this->chatPassword    = $chatPassword;
    }//end __construct()


    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }//end setDid()


    public function setSmsMode(string $smsMode): self
    {
        $this->smsMode = $smsMode;
        return $this;
    }//end setSmsMode()


    public function setForwardToEmail(?string $forwardToEmail): self
    {
        $this->forwardToEmail = $forwardToEmail;
        return $this;
    }//end setForwardToEmail()


    public function setXmppName(?string $xmppName): self
    {
        $this->xmppName = $xmppName;
        return $this;
    }//end setXmppName()


    public function setXmppPasswd(?string $xmppPasswd): self
    {
        $this->xmppPasswd = $xmppPasswd;
        return $this;
    }//end setXmppPasswd()


    public function setPostToUrl(?string $postToUrl): self
    {
        $this->postToUrl = $postToUrl;
        return $this;
    }//end setPostToUrl()


    public function setPostToUrlMethod(?string $postToUrlMethod): self
    {
        $this->postToUrlMethod = $postToUrlMethod;
        return $this;
    }//end setPostToUrlMethod()


    public function setChatEmail(?string $chatEmail): self
    {
        $this->chatEmail = $chatEmail;
        return $this;
    }//end setChatEmail()


    public function setChatPassword(?string $chatPassword): self
    {
        $this->chatPassword = $chatPassword;
        return $this;
    }//end setChatPassword()


    public function toArray(): array
    {
        return array_filter(
            [
                'did'            => $this->did,
                'sms_mode'       => $this->smsMode,
                'forward2email'  => $this->forwardToEmail,
                'xmpp_name'      => $this->xmppName,
                'xmpp_passwd'    => $this->xmppPasswd,
                'post2url'       => $this->postToUrl !== null ? urlencode($this->postToUrl) : null,
                'post2urlmethod' => $this->postToUrlMethod,
                'chat_email'     => $this->chatEmail,
                'chat_passwd'    => $this->chatPassword,
            ],
            fn($value) => $value !== null
        );
    }//end toArray()
}//end class
