<?php

namespace questbluesdk\Models\Responses\IFaxPro;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class IFaxProOrderedDidsListResponse extends BaseResponse
{
    #[Type(name: 'int')]
    private int $total;

    #[Type(name: 'int')]
    private int $totalPages;

    #[Type(name: 'int')]
    private int $currentPage;

    #[Type(name: 'array')]
    private array $data;


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
