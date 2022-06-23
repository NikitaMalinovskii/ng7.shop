<?php

class DBController
{

    // Database connection properties
    protected $host = 'localhost';
    protected $user = 'u1677021_default';
    protected $password = '6PxVc895UIoLtrlN';
    protected $database = 'u1677021_default';

    // Connection property
    public $connection = null;

    // Call constructor
    public function __construct()
    {
        $this->connection = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );
        // This line fixes russian symbols ??? in mysql database
        mysqli_set_charset($this->connection, "utf8");
        // ================================================
        
        if ($this->connection->connect_error) {
            echo 'Fail' . $this->connection->connect_error;
        };

        // echo 'success connection';
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // Close connection
    protected function closeConnection()
    {
        if ($this->connection != null) {
            $this->connection->close();
            $this->connection = null;
        }
    }
}