<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;

$router = new Router();


// Para iniciar session
$router->get('/',[LoginController::class,'login']);
$router->post('/',[LoginController::class,'login']);
//cerrar session
$router->get('/cerrar',[LoginController::class,'cerrarSesion']);
//recuperar contraseña
$router->get('/recuperar',[LoginController::class,'recuperar']);
$router->post('/recuperar',[LoginController::class,'recuperar']);
$router->get('/mensajeRecuperar',[LoginController::class,'mensajeRecuperar']);
$router->post('/mensajeRecuperar',[LoginController::class,'mensajeRecuperar']);
//crear cuenta
$router->get('/crearCuenta',[LoginController::class, 'crearCuenta']);
$router->post('/crearCuenta',[LoginController::class, 'crearCuenta']);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();