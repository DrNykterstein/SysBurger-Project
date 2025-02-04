<?php 


namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController{
    public static function login(Router $router){
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();
        }

        $router->render('auth/login',[
            'alertas'=>$alertas
        ]);
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
                    //Mando el correo
                    $email = new Email($usuario->email,$usuario->nombre,$usuario->token);
                    $email->enviarEmail();
                    //crear usuario
                    $resultado = $usuario->guardar();
                    if($resultado){
                        header('Location: /mensaje');
                    }
                }
            }

        }
        //mando para la vista
        $router->render('auth/crear-cuenta',[
            'usuario'=> $usuario,
            'alertas'=> $alertas
        ]);
       
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router){
        $alertas = []; 
        $token = s($_GET['token']);
        $usuario = Usuario::where('token',$token);
        if(empty($usuario)){
            //Muestro error
            Usuario::setAlerta('error','token no valido');
        }else{
            //token valido
            $usuario->confirmado = "1";
            $usuario->token= null;
            $usuario->guardar();
            Usuario::setAlerta('exito','Cuenta comprobada con exito');
        }

        $alertas = Usuario::getAlertas();
        //renderizo la vista
        $router->render('auth/confirmar-cuenta',[
            'alertas' => $alertas
        ]);
    }
}