<?php
include_once 'api/DBCon.php';

class UserSD {
    
    private $id;
    private $email;
    private $headle;
    private $firstname;
    private $subname;
    private $room;
   
    public function __construct($id) {
        $this->id = $id;
        UserSD::setData(
            UserSD::getHeadleByID($id), 
            UserSD::getFirstNameByID($id), 
            UserSD::getSubNameByID($id), 
            UserSD::getRoomByID($id), 
            UserSD::getEmailByID($id)
            );
    }
    
    private function setData($headle, $firstname, $subname, $room, $email) {
        $this->email = $email;
        $this->room = $room;
        $this->headle = $headle;
        $this->firstname = $firstname;
        $this->subname = $subname;
    }
    
    public function getID() {
        return $this->id;
    }
    
    
    public function getHeadle() {
        return $this->headle;
    }
    
    
    public function getFirstName() {
        return $this->firstname;
    }
    
    
    public function getSubName() {
        return $this->subname;
    }
    
    
    public function getRoom() {
        return $this->room;
    }
    
    
    public function getEmail() {
        return $this-email;
    }
    
    
    public static function getHeadleByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT handle FROM userstudent WHERE id=".$code." LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['handle'];
    }
    
    public static function getRoomByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT room FROM userstudent WHERE id=".$code." LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['room'];
    }
    
    public static function getFirstNameByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT firstname FROM userstudent WHERE id=".$code." LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['firstname'];
    }
    
    public static function getSubNameByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT subname FROM userstudent WHERE id=".$code." LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['subname'];
    }
    
    public static function getEmailByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT email FROM userstudent WHERE id=".$code." LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['email'];
    }
    
}