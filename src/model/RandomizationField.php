<?php
/**
 * Created by PhpStorm.
 * User: BGADEYNE
 * Date: 12/03/2019
 * Time: 17:42
 */

namespace redcapuzgent\Randapidao\model;


class RandomizationField
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

}