<?php
require_once './vista/view.php';
require_once './model/funcionmodel.php';

class funcionesController
{
    private $view;
    private $model;
    private $helper;

    public function __construct()
    {
        $this->view = new view();
        $this->model = new funcionmodel();
        $this->helper = new helper();

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
    }
}
