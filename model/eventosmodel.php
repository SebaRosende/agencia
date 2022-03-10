<?php

class eventosModel
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

/* OTRO EJEMPLO DE CONSULTA CON RIGHT JOIN
function getEventosSinFc()
    {
        $query = $this->db_agencia->prepare('SELECT * FROM funcion RIGHT JOIN evento ON id_evento_fk=id_evento where id_funcion is NULL');
        $query->execute();
        $alleventos = $query->fetchAll(PDO::FETCH_OBJ);
        return $alleventos;
    }

*/   
 function getEventoById($id)
    {
        $query = $this->db_agencia->prepare('SELECT * FROM evento WHERE id_evento=?');
        $query->execute([$id]);
        $evento = $query->fetch(PDO::FETCH_OBJ);
        return $evento;
    }

    function deleteEvento($id_evento)
    {
        $query = $this->db_agencia->prepare('DELETE FROM evento WHERE id_evento=?');
        $query->execute([$id_evento]);
    }



    function buscarEventos($evento)
    {
        $query = $this->db_agencia->prepare('SELECT * FROM evento JOIN funcion ON id_evento=id_evento_fk WHERE nombre=? ');
        $query->execute([$evento]);
        $eventos = $query->fetchAll(PDO::FETCH_OBJ);
        return $eventos;
    }
}
