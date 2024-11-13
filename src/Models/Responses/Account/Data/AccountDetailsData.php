<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class AccountDetailsData
{
    #[Type(name: "string")]
    private string $balance;

    #[Type(name: "string")]
    private string $minimumBalance;

    #[Type(name: "string")]
    private string $reloadAmount;

    #[Type(name: "string")]
    private string $paymentMethod;

    #[Type(name: "string")]
    private string $lowBalanceAlertAmount;

    #[Type(name: "string")]
    private string $balanceAutorefill;

    #[Type(name: "string")]
    private string $balanceNotify;

    public function getBalance(): string
    {
        return $this->balance;
    }

    public function getMinimumBalance(): string
    {
        return $this->minimumBalance;
    }

    public function getReloadAmount(): string
    {
        return $this->reloadAmount;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function getLowBalanceAlertAmount(): string
    {
        return $this->lowBalanceAlertAmount;
    }

    public function getBalanceAutorefill(): string
    {
        return $this->balanceAutorefill;
    }

    public function getBalanceNotify(): string
    {
        return $this->balanceNotify;
    }
}
