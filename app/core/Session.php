<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 23/11/2014
 */

class Session {

    public static function startSession()
    {
        /* If a session doesn't exist, start one. */
        if (session_id() == '') {
            session_start();
        }
    }

    /**
     * Sets a session key to a specified value
     * @param $key
     * @param $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Return the value of a specified key
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * Destroys the current session
     */
    public static function destroy()
    {
        session_destroy();
    }

    public static function handleLogin()
    {
        Session::startSession();

        /* Checks if the session is set from the login */
        if (!isset($_SESSION['user_logged_in'])) {
            Session::destroy();
            header('Location: /AssessmentDatabase/public/login/');
            exit();
        }
    }


}