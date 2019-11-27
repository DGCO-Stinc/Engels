<?php
session_start();

if(!isset($_SESSION['user_ID']))
{
    header("Location: html/login.html");
    exit();
}else
{
    header("Location: html/dashboard.html");
}