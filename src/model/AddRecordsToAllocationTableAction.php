<?php

namespace redcapuzgent\Randapidao\model;

class AddRecordsToAllocationTableAction extends RandApiAction
{
    public function __construct(AddRecordsToAllocationTableParameters $parameters,string $token)
    {
        parent::__construct("addRecordsToAllocationTable", $token, $parameters);
    }

    /**
     * @return AddRecordsToAllocationTableParameters
     */
    public function getParameters(): AddRecordsToAllocationTableParameters
    {
        return parent::getParameters();
    }
}