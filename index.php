<?php
session_start();

if(!isset($_SESSION['user_ID']))
{
    header("Location: login.html");
    exit();
}else
{
    header("Location: dashboard.html");
}