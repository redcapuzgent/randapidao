<?php


namespace redcapuzgent\Randapidao\model;


class UndoRandomizationAction extends RandApiAction
{
    /**
     * UndoRandomizationAction constructor.
     * @param string $recordId The recordid to undo the randomization for.
     * @param string $token A valid API token
     */
    public function __construct(string $recordId, string $token)
    {
        parent::__construct("undoRandomization", $token, $recordId);
    }

    /**
     * @return string
     */
    public function getParameters(): string
    {
        return parent::getParameters();
    }
}