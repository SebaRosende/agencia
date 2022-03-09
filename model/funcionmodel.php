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


    function getFuncionSinEntrada(){

        $query = $this->db_agencia->prepare('SELECT * FROM funcion LEFT JOIN entrada ON id_funcion=id_funcion_fk');
        $query->execute();
        $funciones = $query->fetchAll(PDO::FETCH_OBJ);
        return $funciones;
    
    }

    function deleteFuncion($id_funcion){

        $query = $this->db_agencia->prepare('DELETE from funcion WHERE id_funcion=?');
        $query->execute([$id_funcion]);
        
    }




}