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
        if($USR->login($_REQUEST['uname'],$_REQUEST['pass']))
        {
            echo "success";
        }else
            {
                echo "failed";
            }
    }
}
elseif(isset($_REQUEST['func']) && $_REQUEST['func'] === "register")
{
    if(isset($_REQUEST['uname'])&&isset($_REQUEST['pass']))
    {
        if($USR->register($_REQUEST['uname'],$_REQUEST['pass']))
        {
            echo "success";
        }else
            {
                echo "failed";
            }
    }
}



