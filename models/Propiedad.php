<?php

namespace Model;

class Propiedad extends ActiveRecord{
  
  protected static $tabla = 'propiedades';
  protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorId'];

  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedorId;

  public function __construct($args=[]){

    $this->id = $args['id'] ?? null;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio']?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->vendedorId = $args['vendedorId'] ?? '';
  }
  public function validar(){
   
    if(!$this->titulo){
      self::$errores[] = "El titulo es requerido.";
    }
    if(!$this->precio){
      self::$errores[] = "El precio es requerido.";
    }

    if(!$this->imagen){
      self::$errores[]="La imagen es requerida";
    }
    if(strlen($this->descripcion) < 20 ){
      self::$errores[] = "La descripcion debe ser mayor a 20 caracteres.";
    }
    if(!$this->descripcion){
      self::$errores[] = "La descripcion es requerida.";
    }
    if(!$this->habitaciones){
      self::$errores[] = "La habitacion es requerido.";
    }
    if(!$this->wc){
      self::$errores[] = "El wc es requerido.";
    }
    if(!$this->estacionamiento){
      self::$errores[] = "Es requerido el estacionamiento.";
    }
    if(!$this->vendedorId){
      self::$errores[] = "El vendedor es requerido.";
    }

    return self::$errores;
  }

}

?>