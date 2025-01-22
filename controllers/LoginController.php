<?php 


namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController{
    public static function login(Router $router){

        $router->render('auth/login');
    }

    public static function cerrarSesion(){
        echo "desde cerrar sesion ";
    }

    public static function recuperar(Router $router){
        $router->render('auth/olvide-contraseña',[

        ]);
    }

    public static function mensajeRecuperar(){
        echo "mensaje recuperar";
    }

    public static function crearCuenta(Router $router){
        $usuario = new Usuario($_POST);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);

        }
        $router->render('auth/crear-cuenta',[
            'usuario'=> $usuario
        ]);
       
    }
}