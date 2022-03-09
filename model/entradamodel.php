<?php

class entradaModel
{

    public function __construct()
    {
        $this->db_agencia = new PDO('mysql:host=localhost;' . 'dbname=db_agencia;charset=utf8', 'root', '');
    }


    function  insertEntrada($fecha_venta, $vip, $id_funcion, $id_rol, $id_user)
    {
        $query = $this->db_agencia->prepare('INSERT INTO entrada (fecha_venta, vip, id_funcion, id_rol, id_user) VALUES (?, ?, ?, ?,?)');
        $query->execute([$fecha_venta, $vip, $id_funcion, $id_rol, $id_user]);
        return $this->db_agencia->lastInsertId();
    }


    function eliminarEntrada($id)
    {
        $query = $this->db_agencia->prepare('DELETE from entrada where id_entrada=?');
        $query->execute([$id]);
    }

    function misEntradas($id_user)
    {
        $query = $this->db_agencia->prepare('SELECT * FROM entrada where id_user=?');
        $query->execute([$id_user]);
        $miseventos = $query->fetchAll(PDO::FETCH_OBJ);
        return $miseventos;
    }


    






}
