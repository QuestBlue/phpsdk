<?php

namespace questbluesdk\Models\Account;

class AccountDetail
{
    public AccountDetailData $data;
}

class AccountDetailData
{
    public float $balance;
    public float $minimumBalance;
    public float $reloadAmount;
    public float $allowedCredit;
    public string $paymentMethod;
    public int $lowBalanceAlertAmount;
    public string $balanceAutorefill;
    public string $balanceNotify;
}