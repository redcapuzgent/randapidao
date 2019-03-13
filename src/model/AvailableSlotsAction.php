<?php

namespace redcapuzgent\Randapidao\model;

class AvailableSlotsAction extends RandApiAction
{
    /**
     * AvailableSlotsAction constructor.
     * @param AvailableSlotsParameters $parameters
     * @param string $token
     */
    public function __construct(AvailableSlotsParameters $parameters,$token)
    {
        parent::__construct("availableSlots", $token, $parameters);
    }

    /**
     * @return AvailableSlotsParameters
     */
    public function getParameters(): AvailableSlotsParameters
    {
        return parent::getParameters();
    }
}