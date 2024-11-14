<?php

namespace questbluesdk\Models\Requests\Lnp;

use questbluesdk\Models\Requests\BaseRequest;

/**
 * Class UpdateLnpRequest
 * Represents a request model for updating an existing LNP entry.
 */
class UpdateLnpRequest extends BaseRequest
{
    protected array $data = [];

    public function __construct(array $data = [], string $path = '')
    {
        if ($path !== '') {
            $data['bill_file'] = base64_encode(file_get_contents($path));
            $data['bill_filename'] = base64_encode(basename($path));
        }
        $this->data = $data;
    }

    public function setNumber2Port(array $numbers): self
    {
        $this->data['number2port'] = $numbers;
        return $this;
    }

    public function setFocDate(string $date): self
    {
        $this->data['foc_date'] = $date;
        return $this;
    }

    public function setActivateTime(string $time): self
    {
        $this->data['activate_time'] = $time;
        return $this;
    }

    public function setDidMode(string $mode): self
    {
        $this->data['did_mode'] = $mode;
        return $this;
    }

    public function setTrunk(string $trunk): self
    {
        $this->data['trunk'] = $trunk;
        return $this;
    }

    public function setPartialPort(string $partialPort): self
    {
        $this->data['partial_port'] = $partialPort;
        return $this;
    }

    public function setExtraServices(string $services): self
    {
        $this->data['extra_services'] = $services;
        return $this;
    }

    public function setLocation(string $location): self
    {
        $this->data['location'] = $location;
        return $this;
    }

    public function setCompany(string $company): self
    {
        $this->data['company'] = $company;
        return $this;
    }

    public function setWirelessNo(string $wirelessNo): self
    {
        $this->data['wireless_no'] = $wirelessNo;
        return $this;
    }

    public function setPinCode(string $pincode): self
    {
        $this->data['pincode'] = $pincode;
        return $this;
    }

    public function setSsn(string $ssn): self
    {
        $this->data['ssn'] = $ssn;
        return $this;
    }

    public function setLidbList(string $lidbList): self
    {
        $this->data['lidb_list'] = $lidbList;
        return $this;
    }

    public function setProviderName(string $providerName): self
    {
        $this->data['provider_name'] = $providerName;
        return $this;
    }

    public function setAccountNo(string $accountNo): self
    {
        $this->data['account_no'] = $accountNo;
        return $this;
    }

    public function setAuthorizeContact(string $contact): self
    {
        $this->data['authorize_contact'] = $contact;
        return $this;
    }

    public function setContactTitle(string $title): self
    {
        $this->data['contact_title'] = $title;
        return $this;
    }

    public function setStreetNo(string $streetNo): self
    {
        $this->data['street_no'] = $streetNo;
        return $this;
    }

    public function setDirPrefix(string $prefix): self
    {
        $this->data['dir_prefix'] = $prefix;
        return $this;
    }

    public function setStreetName(string $streetName): self
    {
        $this->data['street_name'] = $streetName;
        return $this;
    }

    public function setDirSuffix(string $suffix): self
    {
        $this->data['dir_suffix'] = $suffix;
        return $this;
    }

    public function setServiceUnit(string $unit): self
    {
        $this->data['service_unit'] = $unit;
        return $this;
    }

    public function setCity(string $city): self
    {
        $this->data['city'] = $city;
        return $this;
    }

    public function setState(string $state): self
    {
        $this->data['state'] = $state;
        return $this;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->data['zipcode'] = $zipcode;
        return $this;
    }

    public function setBillingTelephoneNo(string $phone): self
    {
        $this->data['billing_telephone_no'] = $phone;
        return $this;
    }

    public function setPortOutPin(string $pin): self
    {
        $this->data['port_out_pin'] = $pin;
        return $this;
    }

    /**
     * Convert the request to an array, ready for the API call.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
