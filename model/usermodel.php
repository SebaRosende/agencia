<?php

class usermodel
{

    public function __construct()
    {
        $this->db_agencia = new PDO('mysql:host=localhost;' . 'dbname=db_agencia;charset=utf8', 'root', '');
    }



    function registerUser($userEmail, $userPassword){
        $query = $this->db_agencia->prepare('INSERT INTO usuarios (email, password, id_rol_fk) VALUES (? , ?, ?)');  //Guardo en la BDD.
        $query->execute([$userEmail, $userPassword, 2]);
     
    }

    function getUser($email){
        $query = $this->db_agencia->prepare('SELECT * FROM usuarios WHERE email=?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;

    }



}
