<?php

namespace redcapuzgent\Randapidao\model;


abstract class RandApiAction
{
    /**
     * @var string
     */
    public $action;

    /**
     * @var string
     */
    public $token;

    /**
     * @var \stdClass
     */
    public $parameters;

    /**
     * RandApiAction constructor.
     * @param string $action
     * @param string $token
     * @param \stdClass $parameters
     */
    public function __construct(string $action, string $token, \stdClass $parameters)
    {
        $this->action = $action;
        $this->token = $token;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return \stdClass
     */
    public function getParameters()
    {
        return $this->parameters;
    }

}