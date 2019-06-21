<?php

namespace redcapuzgent\Randapidao\model;

class ChangeSourcesParameters implements \JsonSerializable
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
     * @var RandomizationAllocation[]
     */
    private $allocations;

    /**
     * RandomizeRecordParameters constructor.
     * @param string $recordId The record that we want to randomize
     * @param RandomizationField[] $fields An array of RandomizationFields
     * @param RandomizationAllocation[] $allocations Allocations that will be used if no available allocation records exist
     * @param string $groupId The DAG identifier. default = '' (none)
     * @param string $armName The name of the arm. default = 'Arm 1'
     * @param string $eventName The name of the event. default = 'Event 1'
     */
    public function __construct(string $recordId, array $fields, array $allocations, string $groupId='', string $armName= 'Arm 1', string $eventName= 'Event 1')
    {
        $this->recordId = $recordId;
        $this->fields = $fields;
        $this->groupId = $groupId;
        $this->allocations = $allocations;
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
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @return RandomizationAllocation[]
     */
    public function getAllocations(): array
    {
        return $this->allocations;
    }

    /**
     * @return string
     */
    public function getArmName(): string
    {
        return $this->armName;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->eventName;
    }

    public function jsonSerialize()
    {
        return [
            'recordId' => $this->recordId,
            'fields' => $this->fields,
            'groupId' => $this->groupId,
            'allocations'=>$this->allocations,
            'armName' => $this->armName,
            'eventName' => $this->eventName
        ];
    }


}