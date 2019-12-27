<?php

class Config
{
    private $uname = "deb113326_xxxxxxx";
    private $pass = "!Hallo_123";
    private $dbname = "deb113326_xxxxxxx";
    private $host = "localhost";

    public function getUname()
    {
        return $this->uname;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getDBName()
    {
        return $this->dbname;
    }
    
    public function getHost()
    {
        return $this->host;
    }
}

/*
Rename config.sample.php to config.php and alter the variables to match your environment.
*/