<?php
session_start();
require_once("../user.class.php");
$usr = new User();
$usr->getUserItems();