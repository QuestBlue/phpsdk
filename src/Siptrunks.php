<?php

namespace questbluesdk;

use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Siptrunks
 * Manages SIP trunk-related operations, including creating, listing, updating, and deleting SIP trunks, as well as handling blocked callers.
 */
class Siptrunks extends Connect
{
    private ?string $trunk = null;
    private ?string $trunkRegion = null;
    private ?string $password = null;
    private ?string $ipAddress = null;
    private ?string $domain = null;
    private ?string $did = null;
    private ?int $interCall = null;
    private ?int $interLimit = null;
    private ?string $failover = null;
    private ?string $tn2forward = null;
    private ?int $concurrentMax = null;
    private ?string $trunkStatus = null;
    private string $allowE164Rewrite = 'no';
    private string $allowRtpProxy = 'no';

    private int $itemsPerPage = 10;
    private int $page = 1;

    /**
     * Set the trunk identifier.
     */
    public function setTrunk(string $trunk): self
    {
        $this->trunk = $trunk;
        return $this;
    }

    /**
     * Set the trunk region.
     */
    public function setTrunkRegion(string $region): self
    {
        $this->trunkRegion = $region;
        return $this;
    }

    /**
     * Set the password for the trunk.
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Set the IP address associated with the trunk.
     */
    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * Set the domain for the trunk.
     */
    public function setDomain(string $domain): self
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * Set the DID (Direct Inward Dialing) number associated with the trunk.
     */
    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }

    /**
     * Set the international call status for the trunk.
     */
    public function setInterCall(int $interCall): self
    {
        $this->interCall = $interCall;
        return $this;
    }

    /**
     * Set the international call limit for the trunk.
     */
    public function setInterLimit(int $interLimit): self
    {
        $this->interLimit = $interLimit;
        return $this;
    }

    /**
     * Set the failover configuration for the trunk.
     */
    public function setFailover(string $failover): self
    {
        $this->failover = $failover;
        return $this;
    }

    /**
     * Set the TN (telephone number) to forward.
     */
    public function setTn2forward(string $tn): self
    {
        $this->tn2forward = $tn;
        return $this;
    }

    /**
     * Set the maximum concurrent calls allowed.
     */
    public function setConcurrentMax(int $concurrentMax): self
    {
        $this->concurrentMax = $concurrentMax;
        return $this;
    }

    /**
     * Set the status of the trunk.
     */
    public function setTrunkStatus(string $status): self
    {
        $this->trunkStatus = $status;
        return $this;
    }

    /**
     * Enable or disable E164 rewrite.
     */
    public function setAllowE164Rewrite(bool $allow): self
    {
        $this->allowE164Rewrite = $allow ? 'yes' : 'no';
        return $this;
    }

    /**
     * Enable or disable RTP proxy.
     */
    public function setAllowRtpProxy(bool $allow): self
    {
        $this->allowRtpProxy = $allow ? 'yes' : 'no';
        return $this;
    }

    /**
     * Set the number of items per page for paginated results.
     */
    public function setItemsPerPage(int $itemsPerPage): self
    {
        $this->itemsPerPage = $itemsPerPage;
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
     * Create a new SIP trunk with the configured parameters.
     */
    public function createTrunk(): string|ErrorResponse
    {
        $params = [
            'trunk'             => $this->trunk,
            'region'            => $this->trunkRegion,
            'password'          => $this->password,
            'ip_address'        => $this->ipAddress,
            'did'               => $this->did,
            'inter_call'        => $this->interCall,
            'inter_limit'       => $this->interLimit,
            'failover'          => $this->failover,
            'tn2forward'        => $this->tn2forward,
            'concurrent_max'    => $this->concurrentMax,
            'allow_e164_rewrite'=> $this->allowE164Rewrite,
            'allow_rtp_proxy'   => $this->allowRtpProxy,
        ];

        return $this->query('siptrunk', $params, 'POST');
    }

    /**
     * List all SIP trunks with pagination options.
     */
    public function listTrunks(): string|ErrorResponse
    {
        $params = [
            'trunk'    => $this->trunk,
            'per_page' => $this->itemsPerPage,
            'page'     => $this->page
        ];

        return $this->query('siptrunk', $params);
    }

    /**
     * Update an existing SIP trunk with the configured parameters.
     * Returns the parameters if in debug mode, otherwise executes the update.
     */
    public function updateTrunk(): string|ErrorResponse|array
    {
        $params = [
            'trunk'             => $this->trunk,
            'password'          => $this->password,
            'status'            => $this->trunkStatus,
            'ip_address'        => $this->ipAddress,
            'inter_call'        => $this->interCall,
            'inter_limit'       => $this->interLimit,
            'failover'          => $this->failover,
            'tn2forward'        => $this->tn2forward,
            'concurrent_max'    => $this->concurrentMax,
            'allow_e164_rewrite'=> $this->allowE164Rewrite,
            'allow_rtp_proxy'   => $this->allowRtpProxy,
        ];

        if ($this->debug) {
            return $params;
        }

        return $this->query('siptrunk', $params, 'PUT');
    }

    /**
     * Block or unblock a caller for the specified DID on the SIP trunk.
     */
    public function blockCaller(string $did, string $action = 'block'): string|ErrorResponse
    {
        $params = [
            'trunk'  => $this->trunk,
            'did'    => $did,
            'action' => $action
        ];

        return $this->query('siptrunk/blockcaller', $params, 'POST');
    }

    /**
     * List blocked callers for the specified DID with pagination.
     */
    public function blockedCallers(?string $did = null): string|ErrorResponse
    {
        $params = [
            'trunk'    => $this->trunk,
            'did'      => $did,
            'per_page' => $this->itemsPerPage,
            'page'     => $this->page
        ];

        return $this->query('siptrunk/blockedcallers', $params, 'GET');
    }

    /**
     * Check the status of the SIP trunk.
     */
    public function statusChecker(): string|ErrorResponse
    {
        $params = [
            'trunk' => $this->trunk,
        ];

        return $this->query('siptrunk/statuschecker', $params, 'GET');
    }

    /**
     * Delete the configured SIP trunk.
     */
    public function deleteTrunk(): string|ErrorResponse
    {
        $params = [
            'trunk' => $this->trunk,
        ];

        return $this->query('siptrunk', $params, 'DELETE');
    }
}
