<?php
require_once './smarty/libs/Smarty.class.php';

class view {
    private $smarty;

    function __construct() {
        $this->smarty =new Smarty();
    }

function renderHome(){
    $this->smarty->display('templates/home.tpl');
}

function eventos($eventos){
    $this->smarty->assign('eventos', $eventos);
    $this->smarty->display('templates/eventos.tpl');
}


public function refresh(){
    header('Location: ' . BASE_URL . 'eventos');
}

public function renderRegistro(){
    $this->smarty->display('templates/registrarse.tpl');
}

public function renderLogin(){
    $this->smarty->display('templates/login.tpl');
}

function funciones($funciones){
    $this->smarty->assign('funciones', $funciones);
    $this->smarty->display('templates/funciones.tpl'); 
}

function mostrarBusqueda($eventos){
    $this->smarty->assign('eventos', $eventos);
    $this->smarty->display('templates/busqueda.tpl');  
}

function mostrarMisCompras($entradas){
    $this->smarty->assign('entradas', $entradas);
    $this->smarty->display('templates/misentradas.tpl');
}






}

