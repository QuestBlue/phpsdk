<?php

namespace questbluesdk;

/*
 * Account management
 */
class Account extends Connect {

    
    public function getAccountDetails()
    {
       return $this->query('account/getaccoundetails'); 
    }

    
    public function setLowBalanceAlert($amount)
    {
        $params = [
            'low_balance_alert_amount' => $amount,
        ];
                
       return $this->query('account/setlowbalancealert', $params, 'PUT'); 
    }
    
    
    
    public function setDailyBalanceAlert($action)
    {
        $params = [
            'action' => $action,
        ];
                
        return $this->query('account/setdailybalancealert', $params, 'PUT'); 
    }
    
    
    /*
     * Get account balance
     */
    public function getAccountBalance()
    {
        return $this->query('account/getbalance');
    }

    
    /*
     * Autorefill Setup (enable/disable autorefill)
     */
    public function setAutorefill($autorefill)
    {
        $params = [
            'autorefill' => $autorefill,
        ];
        return $this->query('account/setautorefill', $params, 'PUT');
    }


    /*
     * Set minimum balance and reload amount
     */ 
    public function setBalanceReload($minBalance, $reloadAmount)
    {
        $params = [
            'min_balance' => $minBalance,
            'reload_amount' => $reloadAmount,
        ];
        return $this->query('account/setbalancereload', $params, 'PUT');
    }

    
    /*
     * Refill Account Balance
     */
    public function refillBalance($amount)
    {
        $params = [
            'amount' => $amount,
        ];
        return $this->query('account/refillbalance',  $params, 'POST');
    }
 
    
    /*
     * Get the service general rates
     */
    public function getRates()
    {
        return $this->query('account/rates');
    }
    
    
    /*
     * International calls - Available country list
     */
    public function countryList()
    {
        return $this->query('account/countrylist');
    }
    
    
    /*
     * Get call rate by country ID
     */
    public function countryRate($countryId)
    {
        $params = [
            'country_id'  => $countryId,
        ];
        
         /*$params = '<?xml version="1.0"?><request><country_id>'.$country_id.'</country_id></request>'; */
                
        return $this->query('account/countryrate', $params);
    }
    
    
    /*
     * International Rates Zone 2
     */
    public function interRatesZone2()
    {       
        return $this->query('account/ratezone2');
    }
    
  
    /*
     * Non US inbound TF Rates 
     */
    public function nonUsInTfRate()
    {       
        return $this->query('account/nonusintfrate');
    } 
    
}