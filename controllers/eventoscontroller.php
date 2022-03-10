<?php
require_once './vista/view.php';
require_once './model/eventosmodel.php';
require_once './controllers/authcontroller.php';

class eventosController
{
    private $view;
    private $model;
    private $helper;
    private $funcionesmodel;

    public function __construct()
    {
        $this->view = new view();
        $this->model = new eventosModel();
        $this->funcionesmodel = new funcionmodel();
        $this->helper = new helper();
    }

    function showEventos()
    {
        $alleventos = $this->model->allEventos();
        $this->view->eventos($alleventos);
    }


    function updateCiudad()
    {
        $log = $this->helper->checkRol();
        if ($log) {
            $ciudad = $_REQUEST['ciudad'];
            $id = $_REQUEST['id'];
            $this->model->update($id, $ciudad);
            $this->view->refresh();
        } else {
            echo "No esta logueado como administrador";
        }
    }


    /*
    function deleteEventos()
    {    $log = $this->helper->checkRol();
        $eventos = $this->model->getEventosSinFc();
//        echo "<pre>",var_dump($eventos),'</pre>';
       if ($log) {
            $eventos = $this->model->getEventosSinFc();        
            foreach ($eventos as $info) {
                if ($info->id_evento_fk == NULL) {
                    $this->model->deleteEvento($info->id_evento);
                }
                header('LOCATION:' .BASE_URL.'eventos');
            }

        } else {
            echo "No esta logueado como administrador";
        }
    }
*/
    /*CASO DE BORRAR EVENTOS QUE NO TENGAN FUNCION ASOCIADA*/

    function deleteEventos()
    {
        $eventos = $this->model->allEventos();
        $funciones = $this->funcionesmodel->allFunciones();
        $contador = 0;

        foreach ($eventos as $infoevento) {
             
            
            foreach ($funciones as $info) {

                if ($infoevento->id_evento==$info->id_evento_fk) {
                    $contador += 1;
                }              
            }
            if ($contador == 0) {
                echo "<pre>", var_dump($infoevento->id_evento), '</pre>';
                //$this->model->deleteEvento($infoevento->id_evento);
            }
            $contador = 0;
        }
    }







    function buscarEventos()
    {

        $evento = $_REQUEST['evento'];
        $eventos = $this->model->buscarEventos($evento);

        if (empty($eventos)) {
            echo "no hay eventos";
        } else {
            $this->view->mostrarBusqueda($eventos);
        }
    }
}
