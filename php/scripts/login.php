<?php
require_once("../dbh.inc.php");
$DATA = new DATA();
$dbh = $DATA->connect();


if(isset($_REQUEST['uname'])&&isset($_REQUEST['pass']))
{
    $uname = strtolower(filter_var($_REQUEST['uname'],FILTER_SANITIZE_STRING));
    $pass = md5(filter_var($_REQUEST['pass'],FILTER_SANITIZE_STRING));
    $sql = "SELECT userID, pass FROM eng_user WHERE username = ?";

    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($uname));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if($data['pass'] = $pass)
    {
        session_start();
        $_SESSION['user_ID'] = $data['userID'];
        echo "success";
    }else
    {
        echo "failed";
    }
}

