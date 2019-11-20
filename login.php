<?php
require_once("php/dbh.inc.php");
$dbh = new DATA();


if(isset($_REQUEST['login_submit'])){
    if(isset($_REQUEST['uname'])&&isset($_REQUEST['pass']))
    {
        $uname = strtolower(filter_var($_REQUEST['uname'],FILTER_SANITIZE_STRING));
        $pass = md5(filter_var($_REQUEST['pass'],FILTER_SANITIZE_STRING));
        $sql = "SELECT userID, pass FROM eng_user WHERE username = ?";

        $dbh->prepare($sql);
        $dbh->execute(array($uname));
        $data = $dbh->fetch(PDO::FETCH_ASSOC);
        if($data['pass'] = $pass)
        {
            session_start();
            $_SESSION['user_ID'] = $data['userID'];
            header("Location: dashboard.php");
        }else
        {
            header("Location: index.html");
        }
    }
}



//session_start();

