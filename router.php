<?php

require_once 'controller.php';
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}
$params = explode('/', $action);

$controlador = new controller();

switch ($params[0]) {
    case 'home':
        $controlador->showHome();
        break;
    case 'eventos':
        $controlador->showEventos();
        break;
    case 'funciones':
        $controlador->showFunciones();
        break;
    case 'editarCiudad':
        $controlador->updateCiudad();
        break;
    case 'eliminareventosf':
        $controlador->deleteEventos();
        break;
    case 'registrarse':
        $controlador->showRegistro();
        break;
    case 'login':
        $controlador->showLogin();
        break;
    case 'verify':
        $controlador->login();
        break;
    case 'logout':
        $controlador->logout();
        break;
    case 'comprar':
        $controlador->comprar();
        break;
    case 'buscar':
        $controlador->buscarEventos();
        break;
    case 'miscompras':
        $controlador->misCompras();
        break;
   case 'editarEntrada':
        $controlador->eliminarEntrada($params[1]);
        break;
    default:
        $controlador->showHome();
        break;
}
