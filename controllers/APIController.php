<?php 


namespace Controllers;

use Model\Servicio;

class APIController{
    public static function index(){
        $servicios = Servicio::all();
        echo json_encode($servicios);
        //debuguear($servicios);
    }

    public static function guardar(){
        $respuesta = [
            'mensaje' => 'todo bien'
        ];

        echo json_encode($respuesta);
    }
}