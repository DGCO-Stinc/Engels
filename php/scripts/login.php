<?php
// require_once("../dbh.inc.php");
// $DATA = new DATA();
// $dbh = $DATA->connect();
require_once("../user.class.php");
$USR = new User();


if(isset($_REQUEST['func']) && $_REQUEST['func'] === "login")
{
    if(isset($_REQUEST['uname'])&&isset($_REQUEST['pass']))
    {
        $USR->login($_REQUEST['uname'],$_REQUEST['pass']);   
    }
}
elseif(isset($_REQUEST['func']) && $_REQUEST['func'] === "register")
{
    if(isset($_REQUEST['uname'])&&isset($_REQUEST['pass']))
    {
        $USR->register($_REQUEST['uname'],$_REQUEST['pass']);    
    }
}



