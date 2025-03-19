<?php 

namespace Controllers;

use MVC\Router;

class PedidoController{
    public static function index(Router $router){
        //inicio session
        session_start();
        $router->render('pedido/index',[
            'nombre'=>$_SESSION['nombre'],
            'id'=>$_SESSION['id']
        ]);

    }
}