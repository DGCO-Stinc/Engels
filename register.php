<?php
require_once("php/dbh.inc.php");
$dbh = new DATA();

if(isset($_REQUEST['uname'])&&isset($_REQUEST['pass'])){
    $username = strtolower(filter_var($_REQUEST['uname'],FILTER_SANITIZE_STRING));
    $pass = md5(filter_var($_REQUEST['pass'],FILTER_SANITIZE_STRING));

    $sql = "SELECT * FROM eng_user WHERE username = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($uname));

    if($stmt->rowCount() > 0)
    {
        exit();
    }else
    {
        $sql = "INSERT INTO eng_user (username,pass) VALUES (?,?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute($uname,$pass);
    }

}
