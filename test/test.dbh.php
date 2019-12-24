<?php

require_once("../php/dbh.inc.php");
$data = new DATA();
$dbh = $data->connect();
var_dump($dbh);