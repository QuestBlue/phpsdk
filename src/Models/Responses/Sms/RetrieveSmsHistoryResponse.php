<?php

namespace questbluesdk\Models\Responses\Sms;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class RetrieveSmsHistoryResponse extends BaseResponse
{
    #[Type(name: 'int')]
    protected int $total;

    #[Type(name: 'int')]
    protected int $totalPages;

    #[Type(name: 'int')]
    protected int $currentPage;

    #[Type(name: 'array<questbluesdk\Models\Responses\Sms\Data\SmsRecordData>')]
    protected array $data;


    public function getTotal(): int
    {
        return $this->total;
    }//end getTotal()


    public function getTotalPages(): int
    {
        return $this->totalPages;
    }//end getTotalPages()


    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }//end getCurrentPage()


    public function getData(): array
    {
        return $this->data;
    }//end getData()
}//end class
