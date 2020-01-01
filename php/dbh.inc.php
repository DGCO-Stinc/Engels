<?php

class DATA
{
    private $config;
    public $dbh;

    public function __construct()
    {
        require_once("config.php");
        $this->config = new Config();
    }

    public function connect()
    {
        $this->dbh = null;
        try{
            $this->dbh = new PDO("mysql:host=".$this->config->getHost().";dbname=".$this->config->getDBName(), $this->config->getUname(), $this->config->getPass());
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