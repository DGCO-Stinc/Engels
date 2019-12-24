<?php
session_start();
require("../php/user.class.php");
$USR = new User();

if(!$USR->is_loggedin())
{
    header("Location: login.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../images/favicon.png">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>XPence</title>
</head>
<body class="container">
    <div class="content">
        <div class="navigation">
            <img class="white-logo" src="../images/logo-white.svg" alt="icon white" width="50px" height="50px">
            <ul>
                <li class="nav actief" id="nav1" onclick="hidetext1()"><i class="material-icons">dashboard</i><a>Dashboard</a></li>
                <li class="nav" id="nav2" onclick="hidetext2()"><i class="material-icons">add</i><a>Income</a></li>
                <li class="nav" id="nav3" onclick="hidetext3()"><i class="material-icons">remove</i><a>Expences</a></li>
                <li class="nav" id="nav4" onclick="hidetext4()"><i class="material-icons">create</i><a>Options</a></li>
            </ul>
            <button id="signup" name="signup" onclick="location.href='login.html';">sign up</button>
        </div>
        <div id="main1" class="hidden active">
            <h1>Dashboard</h1>
            <br>
            <br>
            <br>
            <div class="card">
                <div class="card_content">
                    <h3>Hey</h3>
                    <button id="test_button"></button>
                </div>
            </div>
        </div>

        <div id="main2" class="hidden">
            <h1>Income</h1> 
            <div id="main2" class="hidden">
            <h1>Income</h1>  
        </div>
        <div id="main3" class="hidden">
            <h1>Expences</h1>
            <p>Text3</p>
        </div>
        <div id="main4" class="hidden">
            <h1>Options</h1>
            <p>Text4</p>
        </div>
    </div>

    <div class="content2">
        <div onclick="hideAdd()"><i class="material-icons" id="btn">add</i></div>
        <div class="form invisi">
            <h3>Enter Name</h3>
            <input id="input_name" type="text" name="input_name">
            <h3>Enter Type</h3>
            <select id="input_type" name="input_type">
                <option id="input_expence" value="expence">Expence</option>
                <option id="input_income" value="income">Income</option>
            </select>

            <h3>Enter amount</h3>
            <input id="input_amount" type="number" name="input_amount" placeholder="€0" min='0' max='10000' maxlength='5' step='1'>
            <h3>Enter spread</h3>
            <select id="input_spread" name="input_spread">
                <option id="spread_single" value="spread_single">Single time</option>
                <option id="spread_daily" value="spread_daily">Daily</option>
                <option id="spread_weekly" value="spread_weekly">Weekly</option>
                <option id="spread_monthly" value="spread_monthly">Monthly</option>
                <option id="spread_yearly" value="spread_yearly">Annually</option>
            </select>
            <br>
            <button type="button" id="input_submit" name="input_submit">Submit</button>
            <button id="clear" onclick="clearInput()">Clear</button>
            <footer>- 2019-2020 @ Dave Geordi Joran Winson -</footer>
        </div>   
    </div>
    <script src="../js/script.js"></script>
    <script src="../js/jquery-core.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>

<?php

?>