<?php

class DATA
{

    private $uname = "deb113326_2092822";
    private $pass = "!Hallo_123";
    private $dbname = "deb113326_2092822";
    private $host = "localhost";
    public $dbh;

    public function __construct()
    {
        try
        {
            $db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this-uname,$this->pass);
            $this->dbh = $db;
        }catch(PDOException $e)
        {
            echo $e->getErrorMessage();
        }
    }

    public function connect()
    {
        return $this->dbh;
    }
}