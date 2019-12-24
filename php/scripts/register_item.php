<?php
require_once("../user.class.php");
$usr = new User();

$usr->storeUserItem
    (
        $_REQUEST['name'],
        $_REQUEST['amnt'],
        $_REQUEST['type'],
        $_REQUEST['sprd']
    );