<?php

namespace redcapuzgent\Randapidao\model;


class FindAIDAction extends RandApiAction
{
    /**
     * FindAIDAction constructor.
     * @param string $recordId The recordid to find the assigned allocation table record ID for.
     * @param string $token A valid API token
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