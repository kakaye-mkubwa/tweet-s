<?php
include_once 'DBConfig.php';

class DBConnection
{
    private $user = DBConfig::USER;
    protected $pass = DBConfig::PASS;
    protected $db = DBConfig::DBNAME;
    private $host = DBConfig::DBHOST;

    public function connection()
    {
        $conn = new mysqli($this->host,$this->user,$this->pass,$this->db);
        if ($conn->connect_error)
        {
            die("Connection Failed".$conn->connect_error);
        }
        return $conn;
    }
}