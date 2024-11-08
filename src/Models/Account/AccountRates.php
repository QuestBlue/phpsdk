<?php

namespace questbluesdk\Models\Account;

use JMS\Serializer\Annotation\Type;

/**
 * Class AccountRates
 * Represents the account rates data model, containing various rate-related fields.
 */
class AccountRates
{
    /**
     * @var AccountRatesData Contains the detailed account rates information.
     */
    #[Type(name: "questbluesdk\Models\Account\AccountRatesData")]
    public AccountRatesData $data;
}

/**
 * Class AccountRatesData
 * Holds all rate information for different types of DIDs, servers, and services.
 */
class AccountRatesData
{
    /**
     * @var float The cost for a local DID.
     */
    #[Type(name: "float")]
    public float $localDidCost;

    /**
     * @var float The rate for inbound calls.
     */
    #[Type(name: "float")]
    public float $inboundCallRate;

    /**
     * @var float The rate for outbound local calls.
     */
    #[Type(name: "float")]
    public float $outboundLocalCallRate;

    /**
     * @var float The rate for outbound information services.
     */
    #[Type(name: "float")]
    public float $outboundInformation;

    /**
     * @var float The cost for a toll-free DID.
     */
    #[Type(name: "float")]
    public float $tollFreeDidCost;

    /**
     * @var float The rate for toll-free calls.
     */
    #[Type(name: "float")]
    public float $tollFreeCallRate;

    /**
     * @var float The rate for CNAM services.
     */
    #[Type(name: "float")]
    public float $cnamRate;

    /**
     * @var float The rate for E911 services.
     */
    #[Type(name: "float")]
    public float $e911Rate;

    /**
     * @var float The rate for Tier 2 E911 services.
     */
    #[Type(name: "float")]
    public float $e911Tier2Rate;

    /**
     * @var float The rate for off-network E911 services.
     */
    #[Type(name: "float")]
    public float $e911OffnetRate;

    /**
     * @var float The cost for an international DID.
     */
    #[Type(name: "float")]
    public float $internationalDidCost;

    /**
     * @var float The cost for direct-dial international DID.
     */
    #[Type(name: "float")]
    public float $internationalDidDirectDialCost;

    /**
     * @var float The cost for a fax DID.
     */
    #[Type(name: "float")]
    public float $faxDidCost;

    /**
     * @var float The rate per minute for fax services.
     */
    #[Type(name: "float")]
    public float $faxMinuteRate;

    /**
     * @var float The cost for an enterprise fax DID.
     */
    #[Type(name: "float")]
    public float $faxEnterpriseDidCost;

    /**
     * @var float The cost for LNP (Local Number Portability).
     */
    #[Type(name: "float")]
    public float $lnpCost;

    /**
     * @var float The rate for a dedicated server.
     */
    #[Type(name: "float")]
    public float $dedicatedServerRate;

    /**
     * @var float The rate for a VPS server.
     */
    #[Type(name: "float")]
    public float $vpsServerRate;

    /**
     * @var float The rate for a Qube dedicated server.
     */
    #[Type(name: "float")]
    public float $qubeDedicatedServerRate;

    /**
     * @var float The rate for a Qube virtual server.
     */
    #[Type(name: "float")]
    public float $qubeVirtualServerRate;

    /**
     * @var float The rate for a small hosted server.
     */
    #[Type(name: "float")]
    public float $smallHostedServerRate;

    /**
     * @var float The rate for a medium hosted server.
     */
    #[Type(name: "float")]
    public float $mediumHostedServerRate;

    /**
     * @var float The rate with TDR for a medium hosted server.
     */
    #[Type(name: "float")]
    public float $mediumHostedServerRateTdr;

    /**
     * @var float The rate for a large hosted server.
     */
    #[Type(name: "float")]
    public float $largeHostedServerRate;

    /**
     * @var float The rate with TDR for a large hosted server.
     */
    #[Type(name: "float")]
    public float $largeHostedServerRateTdr;

    /**
     * @var float The rate for an enterprise server.
     */
    #[Type(name: "float")]
    public float $enterpriseServerRate;

    /**
     * @var float The rate with TDR for an enterprise server.
     */
    #[Type(name: "float")]
    public float $enterpriseServerRateTdr;

    /**
     * @var float The rate for an enterprise plus server.
     */
    #[Type(name: "float")]
    public float $enterprisePlusServerRate;

    /**
     * @var float The rate with TDR for an enterprise plus server.
     */
    #[Type(name: "float")]
    public float $enterprisePlusServerRateTdr;

    /**
     * @var float The rate for SBC (Session Border Controller) server.
     */
    #[Type(name: "float")]
    public float $sbcServerRate;

    /**
     * @var float The rate for inbound SMS to local DID.
     */
    #[Type(name: "float")]
    public float $inboundSmsLocalDidRate;

    /**
     * @var float The rate for outbound SMS from local DID.
     */
    #[Type(name: "float")]
    public float $outboundSmsLocalDidRate;

    /**
     * @var float The rate for inbound SMS to toll-free DID.
     */
    #[Type(name: "float")]
    public float $inboundSmsTollFreeDidRate;

    /**
     * @var float The rate for outbound SMS from toll-free DID.
     */
    #[Type(name: "float")]
    public float $outboundSmsTollFreeDidRate;

    /**
     * @var float The rate for inbound MMS to local DID.
     */
    #[Type(name: "float")]
    public float $inboundMmsLocalDidRate;

    /**
     * @var float The rate for outbound MMS from local DID.
     */
    #[Type(name: "float")]
    public float $outboundMmsLocalDidRate;

    /**
     * @var float The rate for inbound MMS to toll-free DID.
     */
    #[Type(name: "float")]
    public float $inboundMmsTollFreeDidRate;

    /**
     * @var float The rate for outbound MMS from toll-free DID.
     */
    #[Type(name: "float")]
    public float $outboundMmsTollFreeDidRate;

    /**
     * @var float The rate for off-network SMS service.
     */
    #[Type(name: "float")]
    public float $offnetSmsServiceRate;

    /**
     * @var float The CCRF (Carrier Cost Recovery Fee) rate.
     */
    #[Type(name: "float")]
    public float $ccrf;
}
