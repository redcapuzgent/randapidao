<?php

namespace redcapuzgent\Randapidao\model;

class RandomizationField implements \JsonSerializable
{
    /**
     * @var string
     */
    private $key; //: string,
    /**
     * @var string
     */
    private $value; //: string

    /**
     * RandomizationField constructor.
     * @param string $key
     * @param string $value
     */
    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function jsonSerialize()
    {
        return [
            'key'=>$this->key,
            'value'=>$this->value
        ];
    }

}