<?php

namespace redcapuzgent\Randapidao\model;

class AddRecordsToAllocationTableParameters implements \JsonSerializable
{
    /**
     * @var int
     */
    private $project_status; //: number;

    /**
     * @var RandomizationAllocation[]
     */
    private $allocations;//: RandomizationAllocation[];

    /**
     * AddRecordsToAllocationTableParameters constructor.
     * @param int $project_status
     * @param RandomizationAllocation[] $allocations
     */
    public function __construct(int $project_status, array $allocations)
    {
        $this->project_status = $project_status;
        $this->allocations = $allocations;
    }

    /**
     * @return int
     */
    public function getProjectStatus(): int
    {
        return $this->project_status;
    }

    /**
     * @return RandomizationAllocation[]
     */
    public function getAllocations(): array
    {
        return $this->allocations;
    }

    public function jsonSerialize()
    {
        return [
            'project_status' => $this->project_status,
            'allocations'=>$this->allocations
        ];
    }

}