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
        $alertas = [];//Arreglo de alertas vacio
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            //Si no hay errores
            if(empty($alertas)){
                //Se verifica si el usuario esta registrado o no
                $resultado=$usuario->existeUsuario();
                if($resultado->num_rows){
                    $alertas = Usuario::getAlertas();
                }else{
                    //En caso de que no este registrado
                    $usuario->hashPassword();
                    //genero el token 
                    $usuario->crearToken();
                    debuguear($usuario);
                }
            }

        }
        //mando para la vista
        $router->render('auth/crear-cuenta',[
            'usuario'=> $usuario,
            'alertas'=> $alertas
        ]);
       
    }
}