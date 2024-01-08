<?php

namespace Application\Utilities;

class Database {
    private string $host;
    private string $username;
    private string $password;
    private string $database;
    private $link;

    // Constructor
    public function __construct($config) {
        $this->host = $config['host'];
        $this->username = $config['user']; 
        $this->password = $config['password']; 
        $this->database = $config['name'];

        $this->connect();
    }

    // Method connect to the database
    public function connect(){
        if(!$this->link){
            $this->link = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->link->connect_error) {
                die("Connection failed: " . $this->link->connect_error);
            }
        }

        return $this->link;
    }
    
    // Method to execute SQL queries
    public function query($sql) {
        $result = $this->link->query($sql);
        if (!$result) {
            die("Query failed: " . $this->link->error);
        }
        return $result;
    }

    // Method to escape strings
    public function escape($str) {
        return mysqli_real_escape_string($this->link, $string);
    }

    // Method to close the connection
    public function close() {
        $this->link->close();
    }
}

?>