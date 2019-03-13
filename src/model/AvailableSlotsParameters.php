<?php

namespace redcapuzgent\Randapidao\model;

class AvailableSlotsParameters implements \JsonSerializable
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

    public function jsonSerialize()
    {
        return [
            'source_fields'=>$this->source_fields
        ];
    }

}