<?php
require_once 'libs/Router.php';
require_once './api/api.controller.php';



$router = new Router();

$router->addRoute('eventos/:ID', 'PUT', 'ApiController', 'updateEvento'); //(este endpoint actualiza un evento dado por una id)
$router->addRoute('eventos', 'GET', 'ApiController', 'showEventos'); //Mostrar todos los eventos
$router->addRoute('eventos', 'POST', 'ApiController', 'addEventos'); //Agrega un nuevo evento
$router->addRoute('evento/:ID', 'DELETE', 'ApiController', 'removeEvento'); //Eliminar eventos
$router->addRoute('eventos/:ID', 'GET', 'ApiController', 'showEventoById');//Mostrar un evento según id.

$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($resource, $method);
