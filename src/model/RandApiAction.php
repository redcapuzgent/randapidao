<?php

namespace redcapuzgent\Randapidao\model;

use stdClass;

abstract class RandApiAction implements \JsonSerializable
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
     * @var stdClass | string
     */
    public $parameters;

    /**
     * RandApiAction constructor.
     * @param string $action
     * @param string $token
     * @param stdClass | string $parameters
     */
    public function __construct(string $action, string $token, $parameters)
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
     * @return stdClass | string
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    public function jsonSerialize()
    {
        return [
            'action'=>$this->action,
            'token'=>$this->token,
            'parameters'=>$this->parameters
        ];
    }

}