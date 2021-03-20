<?php
namespace api;

include_once 'api/DBCon.php';

class SelectedSubject {
    
    public static function getIDSubjectByID(string $code) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT IDSubject FROM selectedsubject WHERE Code='".$code."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['IDSubject'];
        }
    }
    
    public static function getM1ByID(string $code, string $idsubject) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT M1 FROM selectedsubject WHERE Code='".$code."' AND IDSubject='".$idsubject."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['M1'];
        }
    }
    
    public static function getM2ByID(string $code, string $idsubject) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT M2 FROM selectedsubject WHERE Code='".$code."' AND IDSubject='".$idsubject."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['M2'];
        }
    }
    
    public static function getM3ByID(string $code, string $idsubject) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT M3 FROM selectedsubject WHERE Code='".$code."' AND IDSubject='".$idsubject."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['M3'];
        }
    }
    
    public static function getM4ByID(string $code, string $idsubject) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT M4 FROM selectedsubject WHERE Code='".$code."' AND IDSubject='".$idsubject."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['M4'];
        }
    }
    
    public static function getM5ByID(string $code, string $idsubject) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT M5 FROM selectedsubject WHERE Code='".$code."' AND IDSubject='".$idsubject."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['M5'];
        }
    }
    
    public static function getM6ByID(string $code, string $idsubject) {
        $dbcon = new DBCon();
        $result = $dbcon->query("SELECT M6 FROM selectedsubject WHERE Code='".$code."' AND IDSubject='".$idsubject."' LIMIT 1");
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            return $num['M6'];
        }
    }
    
    public static function DeleteCodeByID(string $code, string $id) {
        $dbcon = new DBCon();
        $result = $dbcon->query("DELETE FROM selectedsubject WHERE Code='".$code."' AND IDSubject='".$id."' LIMIT 1");
        return $result;
    }
}