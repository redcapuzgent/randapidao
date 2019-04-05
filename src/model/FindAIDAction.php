<?php

namespace redcapuzgent\Randapidao\model;


class FindAIDAction extends RandApiAction
{
    /**
     * FindAIDAction constructor.
     * @param string $recordId
     * @param string $token
     */
    public function __construct(string $recordId, string $token)
    {
        parent::__construct("findAID", $token, $recordId);
    }

    /**
     * @return string
     */
    public function getParameters(): string
    {
        return parent::getParameters();
    }
}