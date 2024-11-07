<?php

namespace questbluesdk\Models\Account;

class AccountBalance
{
    public AccountBalanceData $data;
}

class AccountBalanceData
{
    public float $balance;
    public float $allowedCredit;
}
