<?php
require_once './controllers/entradascontroller.php';
require_once './controllers/eventoscontroller.php';
require_once './controllers/funcionescontroller.php';
require_once './controllers/authcontroller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}
$params = explode('/', $action);

$entradacontrolador = new entradasController();
$funcioncontrolador = new funcionesController();
$eventocontrolador = new eventosController();
$authcontrolador = new authController();

switch ($params[0]) {
    case 'home':
        $funcioncontrolador->showHome();
        break;
    case 'eventos':
        $eventocontrolador->showEventos();
        break;
    case 'funciones':
        $funcioncontrolador->showFunciones();
        break;
    case 'editarCiudad':
        $eventocontrolador->updateCiudad();
        break;
    case 'eliminareventosf':
        $eventocontrolador->deleteEventos();
        break;
    case 'registrarse':
        $authcontrolador->showRegistro();
        break;
    case 'login':
        $authcontrolador->showLogin();
        break;
    case 'verify':
        $authcontrolador->login();
        break;
    case 'logout':
        $authcontrolador->logout();
        break;
    case 'comprar':
        $entradacontrolador->comprar();
        break;
    case 'buscar':
        $eventocontrolador->buscarEventos();
        break;
    case 'miscompras':
        $entradacontrolador->misCompras();
        break;
   case 'editarEntrada':
    $entradacontrolador->eliminarEntrada($params[1]);
        break;
    default:
    $funcioncontrolador->showHome();
        break;
}
