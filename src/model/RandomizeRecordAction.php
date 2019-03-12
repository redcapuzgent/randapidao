<?php
/**
 * Created by PhpStorm.
 * User: BGADEYNE
 * Date: 12/03/2019
 * Time: 17:40
 */

namespace redcapuzgent\Randapidao\model;


class RandomizeRecordAction extends RandApiAction
{
    public function __construct($token, RandomizeRecordParameters $parameters)
    {
        parent::__construct("randomizeRecord", $token, $parameters);
    }
}