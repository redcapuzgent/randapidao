<?php
/**
 * Created by PhpStorm.
 * User: BGADEYNE
 * Date: 12/03/2019
 * Time: 17:41
 */

namespace redcapuzgent\Randapidao\model;


class RandomizeRecordParameters
{
    /**
     * @var string
     */
    private $recordId;//: string,
    /**
     * @var RandomizationField[]
     */
    private $fields; //: RandomizationField[],
    /**
     * @var string
     */
    private $resultFieldName;//: string,
    /**
     * @var string
     */
    private $groupId;//: string = '',
    /**
     * @var string
     */
    private $armName;//: string= 'Arm 1',
    /**
     * @var string
     */
    private $eventName;

    /**
     * RandomizeRecordParameters constructor.
     * @param string $recordId The record that we want to randomize
     * @param RandomizationField[] $fields An array of RandomizationFields
     * @param string $resultFieldName The field where the randomization result can be stored.
     * @param string $groupId The DAG identifier. default = '' (none)
     * @param string $armName The name of the arm. default = 'Arm 1'
     * @param string $eventName The name of the event. default = 'Event 1'
     */
    public function __construct($recordId, array $fields, $resultFieldName, $groupId='', $armName= '', $eventName= 'Arm 1')
    {
        $this->recordId = $recordId;
        $this->fields = $fields;
        $this->resultFieldName = $resultFieldName;
        $this->groupId = $groupId;
        $this->armName = $armName;
        $this->eventName = $eventName;
    }

    /**
     * @return string
     */
    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * @return RandomizationField[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return string
     */
    public function getResultFieldName()
    {
        return $this->resultFieldName;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @return string
     */
    public function getArmName()
    {
        return $this->armName;
    }

    /**
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    } //: string = 'Event 1'




}