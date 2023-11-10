<?php

class Database {
    public $connection;

    /**
     *
     */
    public function __construct()
    {
        $dsn = "mysql:host=172.16.79.39;port=3306;dbname=php_tut;user=phptut;password=secret;charset=utf8mb4";

        $this->connection = new PDO($dsn);
    }

    /**
     * 
     */
    public function query($query)
    {
        
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}
