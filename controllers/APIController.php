<?php 


namespace Controllers;

use Model\Pedido;
use Model\Servicio;

class APIController{
    public static function index(){
        $servicios = Servicio::all();
        echo json_encode($servicios);
        //debuguear($servicios);
    }

    public static function guardar(){
        //Creo la instancia del objeto pedido
        $pedido = new Pedido($_POST);
        $resultado = $pedido->guardar();
        echo json_encode($resultado);
    }
}