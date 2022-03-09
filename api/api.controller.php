<?php
require_once './model/eventosmodel.php';
require_once './api/api.view.php';

class ApiController{

private $model;
private $viewapi;
   
public function __construct()
    {
        $this->model= new eventosModel();
        $this->viewapi = new ApiView();
    }

    function showEventos($params = null){
        $eventos=NULL;
        $eventos=$this->model->allEventos();
    
        if ($eventos){
            $this->viewapi->response($eventos, 200);
        }else{
            $this->viewapi->response("No hay eventos", 204);
        }
        
    }

    function showEventoById($params = null){
        $id = $params[':ID'];
        $evento=$this->model->getEventoById($id);
        if ($evento){
            $this->viewapi->response($evento, 200);
        }else{
            $this->viewapi->response("No hay evento con esa ID", 204);
        }
        
    }


    function updateEvento($params = null){
        $id = $params[':ID'];
        $data = $this->getBody();
        $ciudad = $data->ciudad;
        $this->model->update($id, $ciudad);

    }

    private function getBody()
    {
        $data = file_get_contents("php://input");
        return json_decode($data);
    }





}