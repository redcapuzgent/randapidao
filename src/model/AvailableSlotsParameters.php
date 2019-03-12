<?php
/**
 * Created by PhpStorm.
 * User: BGADEYNE
 * Date: 12/03/2019
 * Time: 17:53
 */

namespace redcapuzgent\Randapidao\model;


class AvailableSlotsParameters
{
    /**
     * @var string[]
     */
    private $source_fields;

    /**
     * AvailableSlotsParameters constructor.
     * @param string[] $source_fields
     */
    public function __construct(array $source_fields)
    {
        $this->source_fields = $source_fields;
    }

    /**
     * @return string[]
     */
    public function getSourceFields()
    {
        return $this->source_fields;
    }

}