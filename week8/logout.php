<?php
/**
 * Created by PhpStorm.
 * User: garry
 * Date: 2017-07-05
 * Time: 8:29 PM
 */
ob_start();
//access the existing session
session_start();
//unset the sesion
session_unset();
//destroy the sesion
session_destroy();
header('location:login.php');
ob_flush();
?>