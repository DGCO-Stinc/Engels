<?php

class DATA
{

    private $uname = "deb113326_2092822";
    private $pass = "!Hallo_123";
    private $dbname = "deb113326_2092822";
    private $host = "localhost";
    public $dbh;

    function connect()
    {
        $this->dbh = null;
        try{
            $this->dbh = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->uname, $this->pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e)
        {
            echo $e->getTraceAsString();
            echo "<br>".$e->getMessage();
            //return $e->getMessage();
        }
        return $this->dbh;
    }
}