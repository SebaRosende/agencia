<?php
require_once './vista/view.php';
require_once './model/funcionmodel.php';
require_once './model/entradamodel.php';

class funcionesController
{
    private $view;
    private $model;
    private $helper;

    private $modelEntrada;
    public function __construct()
    {
        $this->view = new view();
        $this->model = new funcionmodel();
        $this->helper = new helper();
        $this->modelEntrada = new entradaModel();
    }

    function showHome()
    {
        $this->view->renderHome();
    }
    function showFunciones()
    {
        $allfunciones = $this->model->allFunciones();
        $this->view->funciones($allfunciones);
    }

    /*BORRAR FUNCIONES SIN ENTRADAS ASOCIADAS*/
    function deleteFuncionSinEntrada()
    {
        $log = $this->helper->checkRol();
        if ($log) {
        $funciones = $this->model->allFunciones();
        $entradas = $this->modelEntrada->allEntradas();
        //echo "<pre>", var_dump($funciones), '</pre>';
        $contador=0;

        foreach ($funciones as $infoFuncion) {
            foreach ($entradas as $infoEntrada) {                         
                if ($infoFuncion->id_funcion==$infoEntrada->id_funcion_fk) {
                    $contador += 1;
                }              
            }
            if ($contador == 0) {
                echo "<pre>", var_dump($infoFuncion->id_funcion), '</pre>';
                //mando a eliminar la funcion sin entrada.
            }
            $contador = 0;
        }
    } else{
        echo "Debe ser admin";
    }

    }




    /*
    function deleteFuncionSinEntrada()
    {

        $log = $this->helper->checkRol();
        if ($log) {
            $funciones = $this->model->getFuncionSinEntrada();
            foreach ($funciones as $info) {
                if ($info->id_entrada == NULL) {
                    $this->model->deleteFuncion($info->id_funcion);
                }
            }

            header('LOCATION:' . BASE_URL . 'funciones');
        }
        else{
            echo "Debe ser admin";
        }
    }*/
}
