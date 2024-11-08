<?php

namespace questbluesdk\Models\Account;

use JMS\Serializer\Annotation\Type;

/**
 * Class AccountDetail
 * Represents an account details object, containing account data information.
 */
class AccountDetail
{
    /**
     * @var AccountDetailData $data Account details data.
     */
    #[Type(name: "questbluesdk\Models\Account\AccountDetailData")]
    public AccountDetailData $data;
}

/**
 * Class AccountDetailData
 * Contains specific details about the account such as balance, payment method, and alert settings.
 */
class AccountDetailData
{
    /**
     * @var float $balance The current balance available in the account.
     */
    #[Type(name: "float")]
    public float $balance;

    /**
     * @var float $minimumBalance The minimum balance required in the account.
     */
    #[Type(name: "float")]
    public float $minimumBalance;

    /**
     * @var float $reloadAmount The amount to be added during account reloads.
     */
    #[Type(name: "float")]
    public float $reloadAmount;

    /**
     * @var float $allowedCredit The maximum credit limit for the account.
     */
    #[Type(name: "float")]
    public float $allowedCredit;

    /**
     * @var string $paymentMethod The preferred payment method associated with the account.
     */
    #[Type(name: "string")]
    public string $paymentMethod;

    /**
     * @var int $lowBalanceAlertAmount The threshold balance amount that triggers a low balance alert.
     */
    #[Type(name: "int")]
    public int $lowBalanceAlertAmount;

    /**
     * @var string $balanceAutorefill Status indicating if autorefill is enabled for the account.
     */
    #[Type(name: "string")]
    public string $balanceAutorefill;

    /**
     * @var string $balanceNotify Status indicating if balance notifications are enabled.
     */
    #[Type(name: "string")]
    public string $balanceNotify;
}
