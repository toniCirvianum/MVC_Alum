<?php

class User extends Orm {

    public function __construct() {
        parent::__construct('users');
        if(!isset($_SESSION['id_user'])){
            $_SESSION['id_user']=1; //el id 0 i 1 ja estan agafats
        }

    }

    public function login ($us,$pass) {
        foreach ($_SESSION[$this->model] as $user) {
            if ($user['username']==$us) {
                if ($user['password']==$pass) {
                    return $user;
                }
            }
        } return null;
    }



}

?>