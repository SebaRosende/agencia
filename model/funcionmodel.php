<?php

class funcionmodel
{

    public function __construct()
    {
        $this->db_agencia = new PDO('mysql:host=localhost;' . 'dbname=db_agencia;charset=utf8', 'root', '');
    }



    function allFunciones()
    {

        $query = $this->db_agencia->prepare('SELECT * FROM funcion INNER JOIN evento ON id_evento_fk=id_evento');
        $query->execute();
        $allFunciones = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con todos las funciones
        return $allFunciones;
    }








}