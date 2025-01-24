<?php

namespace Model;

class Usuario extends ActiveRecord{
    // database 
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','apellido','email','telefono',
                                    'password','admin','confirmado','token'];
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $password;
    public $admin;
    public $confirmado;
    public $token;

    //construct
    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? null;
        $this->password = $args['password'] ?? '';
        $this->confirmado = $args['confirmado'] ?? null;
        $this->token = $args['token'] ?? '';
    }

    //Validacion de usuarios
    public function validarNuevaCuenta(){
        if(!$this->nombre){
             self::$alertas['error'][] = 'El nombre  es obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido  es obligatorio';
        }
        if(!$this->telefono){
            self::$alertas['error'][] = 'El telefono  es obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El correo  es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'La contraseña  es obligatoria';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'La contraseña debe contener al menos 6 caracteres';

        }
        return self::$alertas;
    }
    //Metodo para revisar si el correo existe
    public function existeUsuario(){
        $query = "SELECT * FROM ".self::$tabla." WHERE email = '".$this->email."' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            self::$alertas['error'][]='El Correo Electronico ya esta registrado';
        }
        return $resultado;
    }

}

