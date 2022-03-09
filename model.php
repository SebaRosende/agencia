<?php

class model
{

    public function __construct()
    {
        $this->db_agencia = new PDO('mysql:host=localhost;' . 'dbname=db_agencia;charset=utf8', 'root', '');
    }

    function allEventos()
    {

        $query = $this->db_agencia->prepare('SELECT * FROM evento');
        $query->execute();
        $allEventos = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con todos los eventos
        return $allEventos;
    }

    function allFunciones()
    {

        $query = $this->db_agencia->prepare('SELECT * FROM funcion INNER JOIN evento ON id_evento_fk=id_evento');
        $query->execute();
        $allFunciones = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con todos las funciones
        return $allFunciones;
    }




    function update($id, $ciudad)
    {
        $query = $this->db_agencia->prepare('UPDATE evento SET ciudad=? WHERE id_evento=?');
        $query->execute([$ciudad, $id]);
    }


    function getEventosSinFc()
    {

        $query = $this->db_agencia->prepare('SELECT * FROM evento LEFT JOIN funcion ON id_evento=id_evento_fk');
        $query->execute();
        $alleventos = $query->fetchAll(PDO::FETCH_OBJ);
        return $alleventos;
    }
    
   




    function getEventoById($id){
        $query = $this->db_agencia->prepare('SELECT * FROM evento WHERE id_evento=?');
        $query->execute([$id]);
        $evento =$query->fetch(PDO::FETCH_OBJ);
        return $evento;

    }

    function deleteEvento($id_evento)
    {
        $query = $this->db_agencia->prepare('DELETE FROM evento WHERE id_evento=?');
        $query->execute([$id_evento]);
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

    function  insertEntrada($fecha_venta, $vip, $id_funcion, $id_user){
        $query = $this->db_agencia->prepare('INSERT INTO entrada (fecha_venta, vip, id_funcion, id_usuario) VALUES (?, ?, ?,?)');
        $query->execute([$fecha_venta, $vip, $id_funcion, $id_user]);
        return $this->db_agencia->lastInsertId();
    }


function buscarEventos($evento){
    $query=$this->db_agencia->prepare('SELECT * FROM evento JOIN funcion ON id_evento=id_evento_fk WHERE nombre=? ');
    $query->execute([$evento]);
    $eventos =$query->fetchAll(PDO::FETCH_OBJ);
    return $eventos;
}

function miseventos($id_user){

$query=$this->db_agencia->prepare('SELECT * FROM entrada where id_user=?');
$query->execute([$id_user]);
$miseventos = $query->fetchAll(PDO::FETCH_OBJ);
return $miseventos;

}

function eliminarEntrada($id){


$query= $this->db_agencia->prepare('DELETE from entrada where id_entrada=?');
$query->execute([$id]);


}






}
