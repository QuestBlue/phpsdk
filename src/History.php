<?php

namespace questbluesdk;

date_default_timezone_set('EST');

class History extends Connect {

    public function countryList()
    {
        return $this->query('account/countrylist');
    }
    
    public function countryList2()
    {     
        return $this->query('account/ratezone2', ['country_list_only' => 'on']);
    }
     
    public function voiceCallHistory($trunk=null,  $period=null,  $did=null, $type=null, $countryId=null, $successCallOnly=null, $summaryOnly=null,  $page=1, $perPage=5)
    {
        $params = [
            'trunk'             => $trunk,
            'period'            => $period,
            'did'               => $did,
            'type'              => $type,
            'country_id'        => $countryId,
            'success_call_only' => $successCallOnly, // Zone 2 Call country ID
            'summary_only'      => $summaryOnly,
            'page'              => $page,
            'per_page'          => $perPage   // 5 - 500
        ];
            
        return $this->query('callhistory', $params);
    }
    
}