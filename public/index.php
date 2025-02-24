<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\PedidoController;
use Controllers\APIController;
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
//Confirmar cuenta
$router->get('/confirmar-cuenta',[LoginController::class, 'confirmar']);
$router->get('/mensaje',[LoginController::class, 'mensaje']);

//Area privada
$router->get('/pedido', [PedidoController::class,'index']);
//API
$router->get('/api/servicios',[APIController::class,'index']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();