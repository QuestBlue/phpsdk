<?php

namespace questbluesdk\Models\Requests\Dids;

class DidModel
{
    public $type;

    public $tier;

    public $did;

    public $note;

    public $route2trunk;

    public $pin;

    public $lidb;

    public $cnam;

    public $e911;

    public $dlda;

    public $forward2did;

    public $failover;

    public $e911CallAlert;

    public $code;

    public $state;

    public $zip;

    public $ratecenter;

    public $npa;

    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    public function setTier($tier): self
    {
        $this->tier = $tier;

        return $this;
    }

    public function setState($state): self
    {
        $this->state = $state;

        return $this;
    }

    public function setRatecenter($ratecenter): self
    {
        $this->ratecenter = $ratecenter;

        return $this;
    }

    public function setNpa($npa): self
    {
        $this->npa = $npa;

        return $this;
    }

    public function setZip($zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function setDid($did): self
    {
        $this->did = $did;

        return $this;
    }

    public function setNote($note): self
    {
        $this->note = $note;

        return $this;
    }

    public function setRoute2trunk($route2trunk): self
    {
        $this->route2trunk = $route2trunk;

        return $this;
    }

    public function setPin($pin): self
    {
        $this->pin = $pin;

        return $this;
    }

    public function setLidb($lidb): self
    {
        $this->lidb = $lidb;

        return $this;
    }

    public function setCnam($cnam): self
    {
        $this->cnam = $cnam;

        return $this;
    }

    public function setE911($e911): self
    {
        $this->e911 = $e911;

        return $this;
    }

    public function setDlda($dlda): self
    {
        $this->dlda = $dlda;

        return $this;
    }

    public function setForward2did($forward2did): self
    {
        $this->forward2did = $forward2did;

        return $this;
    }

    public function setFailover($failover): self
    {
        $this->failover = $failover;

        return $this;
    }

    public function setE911CallAlert($e911CallAlert): self
    {
        $this->e911CallAlert = $e911CallAlert;

        return $this;
    }

    public function setCode($code): self
    {
        $this->code = $code;

        return $this;
    }
}