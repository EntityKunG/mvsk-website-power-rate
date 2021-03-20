<?php
namespace api;

define('DB_SERVER', 'hosting.drite.in.th');
define('DB_USER', 'iceza');
define('DB_PASS', 'c$4n8bZ0');
define('DB_NAME', 'iceza_projectcom64');

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