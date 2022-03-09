<?php
require_once 'view.php';
require_once 'model.php';
require_once 'helper.php';

class controller
{
    private $view;
    private $model;
    private $helper;

    public function __construct()
    {
        $this->view = new view();
        $this->model = new model();
        $this->helper = new helper();
    }

    function showHome()
    {
        $this->view->renderHome();
    }

    function showEventos()
    {
        $alleventos = $this->model->allEventos();
        $this->view->eventos($alleventos);
    }

    function showFunciones()
    {
        $allfunciones = $this->model->allFunciones();
        $this->view->funciones($allfunciones);
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

    function deleteEventos()
    {
        $log = $this->helper->checkRol();
        $eventos = $this->model->getEventosSinFc();
        
        //echo "<pre>",var_dump($eventos),'</pre>';
        if ($log) {
            $eventos = $this->model->getEventosSinFc();
          
            foreach ($eventos as $info) {
                if ($info->id_evento_fk == NULL) {
                    $this->model->deleteEvento($info->id_evento);
                }
            }
        } else {
            echo "No esta logueado como administrador";
        }
    }


    function showRegistro()
    {
        $this->view->renderRegistro();
        if (!empty($_POST['email']) && !empty($_POST['password'])) {  //Verifico si los campos estan vacios o no.
            $userEmail = $_POST['email'];
            $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->model->registerUser($userEmail, $userPassword);
        }
    }


    function showLogin()
    {
        $this->view->renderLogin();
    }

    public function login()  //Verificacion de la cuenta de usuario.
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUser($email);   // Busco el usuario en la BDD.

            if ($user && password_verify($password, $user->password)) { //Verifico si coincide el usuario y la contraseña.
                $this->helper->login($user);  //creo la sesion del usuario.
                header('LOCATION:' . BASE_URL);
            } else {
                echo "Usuario o contraseña invalido.";
            }
        }
    }


    function logout()  //Termina la sesion.
    {
        session_destroy();
        header("Location: " . BASE_URL . 'home');
        die();
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

            if ($fecha_evento < $fecha_venta) {
                echo 'Evento caducado';
            } else {
                for ($i = 0; $i < $cant_entradas; $i++) {
                    $entrada = $this->model->insertEntrada($fecha_venta, $vip, $id_funcion, $id_user);
                    echo "Vendida: " . $entrada;
                }
            }
        } else {
            echo "Debe Loguearse";
        }
    }

    function buscarEventos()
    {
      
        $evento = $_REQUEST['evento'];
        $eventos = $this->model->buscarEventos($evento);
       
       if (empty ($eventos)) {
                   echo "no hay eventos";
        } else {
           $this->view->mostrarBusqueda($eventos);
        }
        }


function misCompras(){
    $id_user = $_SESSION['USER_ID'];
    //var_dump($id_user);
    $miseventos = $this->model->miseventos($id_user);
    $this->view->mostrarMisEventos($miseventos);
    //echo '<pre>',var_dump($miseventos),'</pre>';

}

function eliminarEntrada($id){
//var_dump($id);
$id_user = $_SESSION['USER_ID'];
    $this->model->eliminarEntrada($id);
    $miseventos = $this->model->miseventos($id_user);
    $this->view->mostrarMisEventos($miseventos);
}











}
