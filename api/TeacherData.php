<?php
namespace api;

include_once 'api/DBCon.php';

class TeacherData {
    
    private $id;
    private $name;
    private $group;
    private $email;
    private $consult;
    
    public function __construct($id) {
        $this->id = $id;
        TeacherData::setData(
            TeacherData::getNameByID($id), 
            TeacherData::getGroupByID($id), 
            TeacherData::getEmailByID($id), 
            TeacherData::getConsultByID($id)
            );
    }
    
    private function setData($name, $group, $email, $consult) {
        $this->name = $name;
        $this->group = $group;
        $this->email = $email;
        $this->consult = $consult;
    }
   
    public function getID() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getGroup() {
        return $this->group;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getConsult() {
        return $this->consult;
    }
 
    public static function checkUserByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT name FROM teacherdata WHERE id='".$code."';");
        $num = mysqli_fetch_array($result);
        $value = false;
        if ($num > 0) {
          $value = true;  
        } 
        return $value;
    }
    
    public static function getNameByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT name FROM teacherdata WHERE id='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['name'];
        }
    }
    
    public static function getGroupByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT groups FROM teacherdata WHERE id='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['groups'];
        }
    }
    
    public static function getEmailByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT email FROM teacherdata WHERE id='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['email'];
        }
    }
   
    
    public static function getConsultByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT consult FROM teacherdata WHERE id='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['consult'];
        }
    }
    
}
?>