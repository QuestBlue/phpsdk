<?php

namespace questbluesdk\Account\Models;

class AccountRates
{
    public AccountRatesData $data;
}

class AccountRatesData
{
    public float $localDidCost;
    public float $inboundCallRate;
    public float $outboundLocalCallRate;
    public float $outboundInformation;
    public float $tollFreeDidCost;
    public float $tollFreeCallRate;
    public float $cnamRate;
    public float $e911Rate;
    public float $e911Tier2Rate;
    public float $e911OffnetRate;
    public float $internationalDidCost;
    public float $internationalDidDirectDialCost;
    public float $faxDidCost;
    public float $faxMinuteRate;
    public float $faxEnterpriseDidCost;
    public float $lnpCost;
    public float $dedicatedServerRate;
    public float $vpsServerRate;
    public float $qubeDedicatedServerRate;
    public float $qubeVirtualServerRate;
    public float $smallHostedServerRate;
    public float $mediumHostedServerRate;
    public float $mediumHostedServerRateTdr;
    public float $largeHostedServerRate;
    public float $largeHostedServerRateTdr;
    public float $enterpriseServerRate;
    public float $enterpriseServerRateTdr;
    public float $enterprisePlusServerRate;
    public float $enterprisePlusServerRateTdr;
    public float $sbcServerRate;
    public float $inboundSmsLocalDidRate;
    public float $outboundSmsLocalDidRate;
    public float $inboundSmsTollFreeDidRate;
    public float $outboundSmsTollFreeDidRate;
    public float $inboundMmsLocalDidRate;
    public float $outboundMmsLocalDidRate;
    public float $inboundMmsTollFreeDidRate;
    public float $outboundMmsTollFreeDidRate;
    public float $offnetSmsServiceRate;
    public float $ccrf;
}