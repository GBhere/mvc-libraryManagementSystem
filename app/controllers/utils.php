<?php

namespace Controller;

class Utils{
    public static function authenticateUser($username,$password){
        $rows = \Model\User::getUser($username);
        if(!isset($rows[0])){
            return FALSE;
        }
        if($rows[0]['password'] == \Model\User::getHash($password,$rows[0]['salt']) ){
            return TRUE;
        }
        return FALSE;
    }

    public static function userExists($username){
        $rows = \Model\User::getUser($username);
        if(!isset($rows[0])){
            return FALSE;
        }
        return TRUE;
    }

    public static function isbnExists($isbn){
        $rows = \Model\Books::getBookInfo($isbn);
        if(!isset($rows[0])){
            return FALSE;
        }
        return TRUE;
        
    }

}