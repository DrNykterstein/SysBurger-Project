<?php 


namespace Controllers;
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
        $router->render('auth/crear-cuenta',[

        ]);
       
    }
}