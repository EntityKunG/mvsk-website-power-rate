<?php
namespace api;

include_once 'api/DBCon.php';

class Subject {
    
    public static function getNameByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT Name FROM subjectdata WHERE IDSubject='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['Name'];
    }
    
    public static function getGroupsByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT Groups FROM subjectdata WHERE IDSubject='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['Groups'];
    }
    
    public static function getTypeByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT Type FROM subjectdata WHERE IDSubject='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['Type'];
    }
    
    
    public static function getCreditByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT Credit FROM subjectdata WHERE IDSubject='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['Credit'];
    }
    
    public static function getHoursByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT Hours FROM subjectdata WHERE IDSubject='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['Hours'];
    }
    
    public static function getLevelByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT Level FROM subjectdata WHERE IDSubject='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['Level'];
    }
    
    public static function getTermsByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT Terms FROM subjectdata WHERE IDSubject='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['Terms'];
    }
    
    
    public static function getStudyLineByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT StudyLine FROM subjectdata WHERE IDSubject='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        return $num['StudyLine'];
    }
    
}
    
?>