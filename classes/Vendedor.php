<?php

namespace App;

class Vendedor extends ActiveRecord {
  protected static $tabla = 'vendedores';
  protected static $columnasDB = ['id','nombre','apellidos','telefono'];

  public $id;
  public $nombre;
  public $apellidos;
  public $telefono;
  
  public function __construct($args=[]){

    $this->id = $args['id'] ?? '';
    $this->nombre = s($args['nombre'] ?? '');
    $this->apellidos = $args['apellidos']?? '';
    $this->telefono = $args['telefono'] ?? '';
    
  }
  public function validar(){
   
    if(!$this->nombre){
      self::$errores[] = "El nombre es requerido.";
    }
    if(!$this->apellidos){
      self::$errores[] = "Los apellidos son requeridos.";
    }
   
    if(!$this->telefono){
      self::$errores[] = "El telefono es requerido.";
    }

    return self::$errores;
  }

}

?>