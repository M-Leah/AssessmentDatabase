<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 24/11/2014
 */

class Mail {

    /**
     * @param $to
     * @param $subject
     * @param $message
     */
    public static function sendMail($to, $subject, $message)
    {
        mail($to, $subject, $message);
    }
}