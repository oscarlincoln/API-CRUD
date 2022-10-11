<?php

class Database
{
    // database properties

    private $host = 'localhost';
    private $db_name = 'authentication';
    private $username = 'root';
    private $password = '';
    private $connection = null;

    // function for making the connection 

    public function connect()
    {
        try{
            $this->connection = new PDO("mysql:host=localhost;dbname=".$this->db_name,$this->username,$this->password,);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        return $this->connection;
    }
}