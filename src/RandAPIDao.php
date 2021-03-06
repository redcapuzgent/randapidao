<?php

namespace redcapuzgent\Randapidao;


use redcapuzgent\Randapidao\model\AddRecordsToAllocationTableAction;
use redcapuzgent\Randapidao\model\AvailableSlotsAction;
use redcapuzgent\Randapidao\model\ChangeSourcesAction;
use redcapuzgent\Randapidao\model\FindAIDAction;
use redcapuzgent\Randapidao\model\RandApiAction;
use redcapuzgent\Randapidao\model\RandAPIDAOException;
use redcapuzgent\Randapidao\model\RandomizeRecordAction;
use redcapuzgent\Randapidao\model\UndoRandomizationAction;

class RandAPIDao
{
    /**
     * @var string
     */
    private $apiUrl;

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @param RandomizeRecordAction $action
     * @param bool $verifySSLPeer
     * @param int $verifySSLHost
     * @return int The assigned aid
     * @throws RandAPIDAOException
     */
    public function randomizeRecord(RandomizeRecordAction $action, bool $verifySSLPeer = true, int $verifySSLHost = 2): string{
        $ret = $this->performAction($action,$verifySSLPeer,$verifySSLHost);
        if(is_object($ret)){
            throw new RandAPIDAOException("Object returned: ".print_r($ret,true));
        }else{
            return (int)$ret;
        }
    }

    /**
     * @param ChangeSourcesAction $action
     * @param bool $verifySSLPeer
     * @param int $verifySSLHost
     * @return int The new aid
     * @throws RandAPIDAOException
     */
    public function changeSources(ChangeSourcesAction $action, bool $verifySSLPeer = true, int $verifySSLHost = 2): string{
        $ret = $this->performAction($action,$verifySSLPeer,$verifySSLHost);
        if(is_object($ret)){
            throw new RandAPIDAOException("Object returned: ".print_r($ret,true));
        }else{
            return (int)$ret;
        }
    }

    /**
     * @param ChangeTargetAction $action
     * @param bool $verifySSLPeer
     * @param int $verifySSLHost
     * @return int The new aid
     * @throws RandAPIDAOException
     */
    public function changeTarget(ChangeTargetAction $action, bool $verifySSLPeer = true, int $verifySSLHost = 2): string{
        $ret = $this->performAction($action,$verifySSLPeer,$verifySSLHost);
        if(is_object($ret)){
            throw new RandAPIDAOException("Object returned: ".print_r($ret,true));
        }else{
            return (int)$ret;
        }
    }

    /**
     * @param AvailableSlotsAction $action
     * @param bool $verifySSLPeer
     * @param int $verifySSLHost
     * @return int The number of avaiilable slots
     * @throws RandAPIDAOException
     */
    public function availableSlots(AvailableSlotsAction $action, bool $verifySSLPeer = true, int $verifySSLHost = 2): int
    {
        $ret = $this->performAction($action,$verifySSLPeer,$verifySSLHost);
        if(is_object($ret)){
            throw new RandAPIDAOException("Object returned: ".print_r($ret,true));
        }else{
            return (int)$ret;
        }
    }

    /**
     * Find the assigned allocation table ID (aid column) for a certain record.
     * @param FindAIDAction $action
     * @param bool $verifySSLPeer
     * @param int $verifySSLHost
     * @return int The aid
     * @throws RandAPIDAOException
     */
    public function findAid(FindAIDAction $action, bool $verifySSLPeer = true, int $verifySSLHost = 2): int
    {
        $ret = $this->performAction($action,$verifySSLPeer,$verifySSLHost);
        if(is_object($ret)){
            throw new RandAPIDAOException("Object returned: ".print_r($ret,true));
        }else{
            return (int)$ret;
        }
    }

    /**
     * Undo the randomization for a certain record
     * @param UndoRandomizationAction $action
     * @param bool $verifySSLPeer
     * @param int $verifySSLHost
     * @return bool
     * @throws RandAPIDAOException
     */
    public function undoRandomization(UndoRandomizationAction $action, bool $verifySSLPeer = true, int $verifySSLHost = 2): bool
    {
        $ret = $this->performAction($action,$verifySSLPeer,$verifySSLHost);
        if(is_object($ret)){
            throw new RandAPIDAOException("Object returned: ".print_r($ret,true));
        }else{
            return $ret == "success";
        }
    }

    /**
     * @param AddRecordsToAllocationTableAction $action
     * @param bool $verifySSLPeer
     * @param int $verifySSLHost
     * @return bool
     * @throws RandAPIDAOException
     */
    public function addRecordsToAllocationTable(AddRecordsToAllocationTableAction $action, bool $verifySSLPeer = true, int $verifySSLHost = 2): bool
    {
        $ret = $this->performAction($action, $verifySSLPeer, $verifySSLHost);
        if(is_object($ret)){
            throw new RandAPIDAOException("Object returned: ".print_r($ret,true));
        }else{
            return $ret == "success";
        }
    }

    /**
     * @param RandApiAction $action
     * @param bool $verifySSLPeer CURLOPT_SSL_VERIFYPEER value
     * @param int $verifySSLHost CURLOPT_SSL_VERIFYHOST value
     * @return bool|mixed|string
     * @throws RandAPIDAOException
     */
    private function performAction(RandApiAction $action, bool $verifySSLPeer = true, int $verifySSLHost = 2){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($action));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $verifySSLPeer); // Set to TRUE for production use
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $verifySSLHost); // Set to TRUE for production use
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);


        $output = curl_exec($ch);
        if(!$output){
            $curl_error = curl_error($ch);
            curl_close($ch);
            throw new RandAPIDAOException("Curl error: $curl_error" );
        }else{
            curl_close($ch);
        }
        $jsonDecoded = json_decode($output);
        if(is_array($jsonDecoded)){
            return $jsonDecoded;
        }else if(is_object($jsonDecoded)){
            return $jsonDecoded;
        }else if(is_string($jsonDecoded)) {
            return $jsonDecoded;
        }else{
            return $output;
        }
    }


}