<?php
require_once("../dbh.inc.php");
$DATA = new DATA();
$dbh = $DATA->connect();

// the error is somewhere in here...
if(isset($_REQUEST['uname'])&&($_REQUEST['pass']))
{
    $uname = strtolower(filter_var($_REQUEST['uname'],FILTER_SANITIZE_STRING)); // grab ajax input
    $pass = md5(filter_var($_REQUEST['pass'],FILTER_SANITIZE_STRING));

    $sql = "SELECT userID FROM eng_user WHERE username = ?"; // make a list of users that match later input
    
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($uname)); // execute sql statement to compare $uname with list.

    if($stmt->rowCount() > 0) // check if there is an item returned, if so, a username already exists
    {
        echo "failed";
    }else // username not found, can register
    {
        $sql = "INSERT INTO eng_user (username, pass) VALUES (?,?)"; // 

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($uname,$pass));
        echo "success";
    }
}else
{
    echo "failed";
}