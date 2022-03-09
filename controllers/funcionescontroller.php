<?php
require_once './vista/view.php';
require_once './model/funcionmodel.php';

class funcionesController
{
    private $view;
    private $model;
    

    public function __construct()
    {
        $this->view = new view();
        $this->model = new funcionmodel();
       
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



}