<?php 


namespace Model;

class Pedido extends ActiveRecord{
    // Base de datos
    protected static $tabla = 'pedidos';
    protected static $columnasDB = ['idpedidos','fecha','hora','usuarioid'];

    public $idpedidos;
    public $fecha;
    public $hora;
    public $usuarioid;

    //constructor
    public function __construct($args = []){
        $this->idpedidos = $args['idpedidos'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->usuarioid = $args['usuarioid'] ?? '';
    }

   
    
}