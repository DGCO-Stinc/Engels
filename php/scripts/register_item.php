<?php
session_start();
require_once("../user.class.php");
$usr = new User();

if($usr->storeUserItem
    (
        $_REQUEST['name'],
        $_REQUEST['amnt'],
        $_REQUEST['type'],
        $_REQUEST['sprd']
    ))
{
    echo "success";
}else
    {
        echo "failed";
    }