<?php
/**
 * Created by PhpStorm.
 * User: BGADEYNE
 * Date: 12/03/2019
 * Time: 17:47
 */

namespace redcapuzgent\Randapidao\model;

use Exception;

class RandomizationAllocation
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
     * @throws Exception
     */
    public function __construct(array $source_fields, string $target_field)
    {
        if(!sizeof($source_fields) < 1 || sizeof($source_fields) > 15){
            throw new Exception("Invalid source_fields parameter");
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

}