<?php

namespace questbluesdk\Models\Responses\Lnp;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use questbluesdk\Models\Responses\BaseResponse;

class ListLnpResponse extends BaseResponse
{

    #[Type('int')]
    protected int $total;

    #[Type('int')]
    #[SerializedName('total_pages')]
    protected int $totalPages;

    #[Type('int')]
    #[SerializedName('current_page')]
    protected int $currentPage;

    #[Type('array<questbluesdk\Models\Responses\Lnp\Data\LnpResponseData>')]
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
