<?php
session_start();

if(!isset($_SESSION['user_ID'])) // user is not logged in
{
    header("Location: html/login.html");
    exit();
}else // user is logged in
{
    header("Location: html/dashboard.html");
}


