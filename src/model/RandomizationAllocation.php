<?php

namespace redcapuzgent\Randapidao\model;

class RandomizationAllocation implements \JsonSerializable
{
    /**
     * @var string[] Ordered list of source_field values. A maximum of 15 items is allowed.
     */
    private $source_fields;
    /**
     * @var string The value for the target_field
     */
    private $target_field;

    /**
     * RandomizationAllocation constructor.
     * @param array $source_fields
     * @param string $target_field
     * @throws RandAPIDAOException
     */
    public function __construct(array $source_fields, string $target_field)
    {
        if(!sizeof($source_fields) < 1 || sizeof($source_fields) > 15){
            throw new RandAPIDAOException("Invalid source_fields parameter");
        }
        $this->source_fields = $source_fields;
        $this->target_field = $target_field;
    }

    /**
     * @return string[]
     */
    public function getSourceFields()
    {
        return $this->source_fields;
    }

    /**
     * @return string
     */
    public function getTargetField()
    {
        return $this->target_field;
    }

    public function jsonSerialize()
    {
        return[
            'source_fields'=>$this->source_fields,
            'target_field'=>$this->target_field
        ];
    }

}