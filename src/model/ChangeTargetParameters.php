<?php

namespace redcapuzgent\Randapidao\model;

class ChangeTargetParameters implements \JsonSerializable
{
    /**
     * @var string
     */
    private $recordId;//: string,
    /**
     * @var string
     */
    private $target;
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
     * @param string $target The new target
     * @param RandomizationAllocation[] $allocations Allocations that will be used if no available allocation records exist
     * @param string $groupId The DAG identifier. default = '' (none)
     * @param string $armName The name of the arm. default = 'Arm 1'
     * @param string $eventName The name of the event. default = 'Event 1'
     */
    public function __construct(string $recordId, string $target, array $allocations, string $groupId='', string $armName= 'Arm 1', string $eventName= 'Event 1')
    {
        $this->recordId = $recordId;
        $this->target = $target;
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
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
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
            'target' => $this->target,
            'groupId' => $this->groupId,
            'allocations'=>$this->allocations,
            'armName' => $this->armName,
            'eventName' => $this->eventName
        ];
    }


}