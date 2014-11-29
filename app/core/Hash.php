<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 25/11/2014
 */

class Hash {

    private $hash;

    /**
     * @return string
     */
    public function createHash()
    {
        return $rand = md5(sha1(rand(1000,10000)));
    }




}