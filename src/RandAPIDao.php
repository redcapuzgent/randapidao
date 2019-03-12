<?php
/**
 * Created by PhpStorm.
 * User: BGADEYNE
 * Date: 12/03/2019
 * Time: 11:24
 */

namespace redcapuzgent\Randapidao;


class RandAPIDao
{
    /**
     * @var string
     */
    private $apiUrl;
    /**
     * @var string
     */
    private $apiToken;

    public function __construct($apiToken, $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
    }

    public function doCall($fields){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields, '', '&'));
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
            echo 'Curl error: ' . curl_error($ch);
        }
        curl_close($ch);
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