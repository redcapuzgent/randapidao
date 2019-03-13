<?php

namespace redcapuzgent\Randapidao;


use redcapuzgent\Randapidao\model\RandApiAction;
use redcapuzgent\Randapidao\model\RandAPIDAOException;

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
     * Perform a Randapi action
     * @param RandApiAction $action
     * @return bool|mixed|string
     * @throws RandAPIDAOException
     */
    public function performAction(RandApiAction $action){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($action, '', '&'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Set to TRUE for production use
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Set to TRUE for production use
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);


        $output = curl_exec($ch);
        if(!$output){
            curl_close($ch);
            throw new RandAPIDAOException('Curl error: ' . curl_error($ch));
        }else{
            curl_close($ch);
        }
        $jsonDecoded = json_decode($output);
        if(is_array($jsonDecoded)){
            return $jsonDecoded;
        }else if(is_object($jsonDecoded)){
            return $jsonDecoded;
        }else{
            return $output;
        }
    }


}