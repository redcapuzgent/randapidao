<?php

namespace redcapuzgent\Randapidao\model;


use \Exception;
use \Throwable;

class RandAPIDAOException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}