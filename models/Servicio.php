<?php 


namespace Model;

class Servicio extends ActiveRecord{
    // Base de datos
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['idservicios','nombre','precio'];

    public $idservicios;
    public $nombre;
    public $precio;

    public function __construct($args = []){
        $this->idservicios = $args['idservicios'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }
}