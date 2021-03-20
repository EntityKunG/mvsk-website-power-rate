<?php
namespace api;

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvsk_oop');

class DBCon {
    
    private $connection;
    
    public function __construct() {
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysqli_error());
    }
    
    public function query($query_string) {
        return mysqli_query($this->connection, $query_string);
    }
    
    public function close() {
        return mysqli_close($this->connection);
    }
    

}