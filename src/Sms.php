<?php

namespace questbluesdk;

use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Sms
 * Manages SMS-related operations, including configuration updates, message sending, and off-network service management.
 */
class Sms extends Connect
{
    private ?string $did = null;
    private ?string $smsMode = null;
    private ?string $forwardToEmail = null;
    private ?string $xmppName = null;
    private ?string $xmppPasswd = null;
    private ?string $postToUrl = null;
    private ?string $postToUrlMethod = null;
    private ?string $chatEmail = null;
    private ?string $chatPassword = null;
    private ?string $smsV2Value = null;

    private int $version = 2;
    private int $perPage = 10;
    private int $page = 1;

    /**
     * Set the DID (Direct Inward Dialing) number.
     */
    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }

    /**
     * Set the SMS mode.
     */
    public function setSmsMode(string $mode): self
    {
        $this->smsMode = $mode;
        return $this;
    }

    /**
     * Set the email address for SMS forwarding.
     */
    public function setForwardToEmail(string $forwardToEmail): self
    {
        $this->forwardToEmail = $forwardToEmail;
        return $this;
    }

    /**
     * Set the XMPP username.
     */
    public function setXmppName(string $xmppName): self
    {
        $this->xmppName = $xmppName;
        return $this;
    }

    /**
     * Set the XMPP password.
     */
    public function setXmppPasswd(string $xmppPasswd): self
    {
        $this->xmppPasswd = $xmppPasswd;
        return $this;
    }

    /**
     * Set the URL for posting messages.
     */
    public function setPostToUrl(string $postToUrl): self
    {
        $this->postToUrl = $postToUrl;
        return $this;
    }

    /**
     * Set the method for posting messages (e.g., form, JSON, XML).
     */
    public function setPostToUrlMethod(string $postToUrlMethod): self
    {
        $this->postToUrlMethod = $postToUrlMethod;
        return $this;
    }

    /**
     * Set the chat email.
     */
    public function setChatEmail(string $chatEmail): self
    {
        $this->chatEmail = $chatEmail;
        return $this;
    }

    /**
     * Set the chat password.
     */
    public function setChatPassword(string $chatPassword): self
    {
        $this->chatPassword = $chatPassword;
        return $this;
    }

    /**
     * Set the SMS v2 value.
     */
    public function setSmsV2Value(string $smsV2Value): self
    {
        $this->smsV2Value = $smsV2Value;
        return $this;
    }

    /**
     * Set the SMS version (1 or 2).
     */
    public function setSmsVersion(int $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Set the number of items per page for paginated results.
     */
    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * Set the page number for paginated results.
     */
    public function setPage(int $page): self
    {
        $this->page = $page;
        return $this;
    }

    /**
     * List available DIDs for SMS.
     */
    public function listAvailableDids(): string|ErrorResponse
    {
        $params = [
            'did'      => $this->did,
            'per_page' => $this->perPage,
        ];

        return $this->query('sms', $params);
    }

    /**
     * Update SMS configuration based on the version.
     */
    public function updateSmsConfig(): string|ErrorResponse
    {
        return $this->version === 2 ? $this->updateSmsConfigV2() : $this->updateSmsConfigV1();
    }

    /**
     * Update SMS configuration for version 1.
     */
    private function updateSmsConfigV1(): string|ErrorResponse
    {
        $params = [
            'did'            => $this->did,
            'sms_mode'       => $this->smsMode,
            'forward2email'  => $this->forwardToEmail,
            'xmpp_name'      => $this->xmppName,
            'xmpp_passwd'    => $this->xmppPasswd,
            'post2url'       => $this->postToUrl !== null ? urlencode($this->postToUrl) : null,
            'post2urlmethod' => $this->postToUrlMethod,
            'chat_email'     => $this->chatEmail,
            'chat_passwd'    => $this->chatPassword,
        ];

        return $this->query('sms', $params, 'PUT');
    }

    /**
     * Update SMS configuration for version 2.
     */
    private function updateSmsConfigV2(): string|ErrorResponse
    {
        $params = [
            'did'      => $this->did,
            'sms_mode' => $this->smsMode,
            'value'    => $this->smsV2Value,
        ];

        return $this->query('smsv2', $params, 'PUT');
    }

    /**
     * Check delivery status of a message by its ID.
     */
    public function deliveryStatus(string $msgId): string|ErrorResponse
    {
        $params = [
            'msg_id' => $msgId,
        ];

        return $this->query('smsv2/deliverystatus', $params, 'GET');
    }

    /**
     * Send an SMS message with optional file attachment.
     */
    public function sendMsg(string $didFrom, string $didTo, string $msg, ?string $fpath = null): string|ErrorResponse
    {
        $params = [
            'did'    => $didFrom,
            'did_to' => $didTo,
            'msg'    => $msg,
        ];

        if ($this->version === 2) {
            $params['file_url'] = $fpath;
            return $this->query('smsv2', $params, 'POST');
        } elseif ($fpath && is_file($fpath)) {
            $params += [
                'file'  => base64_encode(file_get_contents($fpath)),
                'fname' => base64_encode(pathinfo($fpath)['basename']),
            ];
        }

        return $this->query('sms', $params, 'POST');
    }

    /**
     * Manage the off-network SMS service for the specified action.
     */
    public function manageOffnetSmsService(string $action): string|ErrorResponse
    {
        $params = [
            'did'          => $this->did,
            'offnetaction' => $action,
        ];

        return $this->query('sms/offnetorder', $params, 'POST');
    }

    /**
     * Check the status of the off-network SMS service.
     */
    public function statusOffnetSmsService(): string|ErrorResponse
    {
        $params = [
            'did' => $this->did,
        ];

        return $this->query('sms/offnetstatus', $params, 'GET');
    }

    /**
     * Retrieve the SMS history with filters for direction and message type.
     */
    public function getSmsHistory(): string|ErrorResponse
    {
        $params = [
            'period'    => [strtotime('2020-08-25 00:00:31'), strtotime('2020-08-25 00:00:00')],
            'direction' => 'in',      // Options: 'in', 'out', or empty
            'msg_type'  => 'sms',     // Options: 'sms', 'mms'
            'per_page'  => $this->perPage,
            'page'      => $this->page,
        ];

        return $this->query($this->version === 2 ? 'smsv2/history' : 'sms/history', $params, 'GET');
    }
}
