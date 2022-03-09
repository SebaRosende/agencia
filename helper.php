<?php

class helper {

    function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {  //Abre sesion.
            session_start();
        }

}


public function login($user)
    {
        $_SESSION['logueado']=true; //lo agrego manual para verificar si esta logueado.
        $_SESSION['USER_ID'] = $user->id_user;
        $_SESSION['USER_EMAIL'] = $user->email;
        $_SESSION['USER_ROL'] = $user->id_rol_fk;
 
    }

public function checkRol(){ //verifica el log de admin
    if (isset($_SESSION['USER_ROL'])) {
        if (($_SESSION['USER_ROL']) == 1) {
            return true;
        } else {
            return false;
        }
    }
}

public function UserLogged()  //Verifica Sesion abierta de user o admin.
    {
        if (isset($_SESSION['USER_ID'])) {
            return true;
        } else {
            return false;
            
        }
    }



}