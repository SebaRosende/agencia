<?php
require_once './vista/view.php';
require_once './model/entradamodel.php';
require_once './helper/helper.php';

class entradasController
{
    private $view;
    private $model;
    private $helper;

    public function __construct()
    {
        $this->view = new view();
        $this->model = new entradaModel();
        $this->helper = new helper();
    }




    function comprar()
    {

        $logUser = $this->helper->UserLogged();
        
        if ($logUser) {

            $cant_entradas = $_REQUEST['cant_entradas'];
            $vip = $_REQUEST['vip'];
            $id_funcion = $_REQUEST['id_funcion'];
            $fecha_evento = $_REQUEST['fecha'];
            $fecha_venta = date('Y-m-d');
            $id_user = $_SESSION['USER_ID'];
            $id_rol = $_SESSION['USER_ROL'];

            if ($fecha_evento < $fecha_venta) {
                echo 'Evento caducado';
            } else {
                for ($i = 0; $i < $cant_entradas; $i++) {
                    $entrada = $this->model->insertEntrada($fecha_venta, $vip, $id_funcion, $id_rol, $id_user);
                    echo "Vendida: " . $entrada;
                }
            }
        } else {
            echo "Debe Loguearse";
        }
    }



    function misCompras()
    {
       
        $logUser = $this->helper->UserLogged();
        if ($logUser) {
        $id_user = $_SESSION['USER_ID'];
        $misEntradas = $this->model->misEntradas($id_user);
        $this->view->mostrarMisCompras($misEntradas);}
        else {
            echo "Debe Loguearse";
        }
       
    }

    function eliminarEntrada($id=null)
    {
        $logUser = $this->helper->UserLogged();
        if ($logUser) {
        $this->model->eliminarEntrada($id);
        header('LOCATION:' . BASE_URL.'miscompras');
        }else {
            echo "Debe Loguearse";
        }
      }


     

}
