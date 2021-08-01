<?php

namespace Apps;

use Apps\DatabaseConnection as DatabaseConnections;

class DatabaseConnection
{
    private $connection; 
    private $serverName; 
    private $username; 
    private $databasebname;  
    public static $instanceFun;

    private function __construct()
    {
        require_once 'Config/config.php';

        $this->serverName = DB_SERVER;
        $this->username = DB_USER;
        $this->password = DB_PWD;
        $this->databasebname = DB_NAME;
        $this->connect();
    }
  
    public function getConnction()
    {
        if (isset($this->connection)) {
            $this->connect();
        }

        return $this->connection;
    }

    public static function getInstance()
    {
        if (!isset(DatabaseConnection::$instanceFun)) {
            DatabaseConnection::$instanceFun = new DatabaseConnection();
        }

        return DatabaseConnection::$instanceFun;
    }

    private function connect()
    {
        try {
            $this->connection = new \PDO("mysql:host=$this->serverName;dbname=$this->databasebname", $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception("Connection failed: " . $e->getMessage());
        }
    }
}
