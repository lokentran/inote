<?php

namespace App\Model;

use PDO;

class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=inote;charset=utf8";
        $this->username = 'root';
        $this->password = '1234Tung@123';
    }

    public function connect()
    {
        try {
            return new PDO($this->dsn,$this->username,$this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    
}