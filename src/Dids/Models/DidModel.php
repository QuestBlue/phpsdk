<?php

namespace questbluesdk\Dids\Models;

/**
 * Class DidModel
 * Represents a model for a DID with various configurations and settings.
 */
class DidModel
{
    /**
     * @var string|null The type of the DID (e.g., local, toll-free).
     */
    public ?string $type = null;

    /**
     * @var int|null The tier level for the DID.
     */
    public ?int $tier = null;

    /**
     * @var string|null The DID number (e.g., phone number format).
     */
    public ?string $did = null;

    /**
     * @var string|null A note or description associated with the DID.
     */
    public ?string $note = null;

    /**
     * @var string|null Trunk route configuration for the DID.
     */
    public ?string $route2trunk = null;

    /**
     * @var string|null The pin code for security or identification.
     */
    public ?string $pin = null;

    /**
     * @var bool|null Indicates if LIDB (Line Information Database) is enabled.
     */
    public ?bool $lidb = null;

    /**
     * @var bool|null Indicates if CNAM (Caller Name) is enabled.
     */
    public ?bool $cnam = null;

    /**
     * @var bool|null Indicates if E911 (Emergency 911) is enabled.
     */
    public ?bool $e911 = null;

    /**
     * @var bool|null DLDA (Directory Listing Delivery Area) configuration.
     */
    public ?bool $dlda = null;

    /**
     * @var string|null DID to forward calls to.
     */
    public ?string $forward2did = null;

    /**
     * @var string|null Failover configuration in case of primary route failure.
     */
    public ?string $failover = null;

    /**
     * @var bool|null Indicates if E911 call alert notifications are enabled.
     */
    public ?bool $e911CallAlert = null;

    /**
     * @var string|null Unique code or identifier for the DID.
     */
    public ?string $code = null;

    /**
     * @var string|null The state or region where the DID is located.
     */
    public ?string $state = null;

    /**
     * @var string|null ZIP or postal code associated with the DID location.
     */
    public ?string $zip = null;

    /**
     * @var string|null The rate center associated with the DID.
     */
    public ?string $ratecenter = null;

    /**
     * @var string|null NPA (Numbering Plan Area) code for the DID.
     */
    public ?string $npa = null;

    /**
     * Set the type of DID.
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set the tier level for the DID.
     *
     * @param int $tier
     * @return $this
     */
    public function setTier(int $tier): self
    {
        $this->tier = $tier;
        return $this;
    }

    /**
     * Set the state or region for the DID.
     *
     * @param string $state
     * @return $this
     */
    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Set the rate center for the DID.
     *
     * @param string $ratecenter
     * @return $this
     */
    public function setRatecenter(string $ratecenter): self
    {
        $this->ratecenter = $ratecenter;
        return $this;
    }

    /**
     * Set the NPA (Numbering Plan Area) code for the DID.
     *
     * @param string $npa
     * @return $this
     */
    public function setNpa(string $npa): self
    {
        $this->npa = $npa;
        return $this;
    }

    /**
     * Set the ZIP or postal code for the DID.
     *
     * @param string $zip
     * @return $this
     */
    public function setZip(string $zip): self
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * Set the DID number.
     *
     * @param string $did
     * @return $this
     */
    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }

    /**
     * Set a note or description for the DID.
     *
     * @param string $note
     * @return $this
     */
    public function setNote(string $note): self
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Set the trunk route for the DID.
     *
     * @param string $route2trunk
     * @return $this
     */
    public function setRoute2trunk(string $route2trunk): self
    {
        $this->route2trunk = $route2trunk;
        return $this;
    }

    /**
     * Set the pin code for the DID.
     *
     * @param string $pin
     * @return $this
     */
    public function setPin(string $pin): self
    {
        $this->pin = $pin;
        return $this;
    }

    /**
     * Enable or disable LIDB for the DID.
     *
     * @param bool $lidb
     * @return $this
     */
    public function setLidb(bool $lidb): self
    {
        $this->lidb = $lidb;
        return $this;
    }

    /**
     * Enable or disable CNAM for the DID.
     *
     * @param bool $cnam
     * @return $this
     */
    public function setCnam(bool $cnam): self
    {
        $this->cnam = $cnam;
        return $this;
    }

    /**
     * Enable or disable E911 for the DID.
     *
     * @param bool $e911
     * @return $this
     */
    public function setE911(bool $e911): self
    {
        $this->e911 = $e911;
        return $this;
    }

    /**
     * Enable or disable DLDA for the DID.
     *
     * @param bool $dlda
     * @return $this
     */
    public function setDlda(bool $dlda): self
    {
        $this->dlda = $dlda;
        return $this;
    }

    /**
     * Set the forward DID for routing calls.
     *
     * @param string $forward2did
     * @return $this
     */
    public function setForward2did(string $forward2did): self
    {
        $this->forward2did = $forward2did;
        return $this;
    }

    /**
     * Set the failover configuration for the DID.
     *
     * @param string $failover
     * @return $this
     */
    public function setFailover(string $failover): self
    {
        $this->failover = $failover;
        return $this;
    }

    /**
     * Enable or disable E911 call alerts.
     *
     * @param bool $e911CallAlert
     * @return $this
     */
    public function setE911CallAlert(bool $e911CallAlert): self
    {
        $this->e911CallAlert = $e911CallAlert;
        return $this;
    }

    /**
     * Set a unique code or identifier for the DID.
     *
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
}
