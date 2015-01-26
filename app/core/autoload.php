<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 26/01/2015
 */

spl_autoload_register(function($class) {
    require_once '../app/core/' . $class . '.php';
});