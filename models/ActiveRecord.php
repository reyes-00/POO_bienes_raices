<?php

namespace Model;

class ActiveRecord{

  // Conectar db
  protected static $db;
  protected static $tabla = '';
  protected static $columnasDB = [];

  protected static $errores = [];

  public static function setDB($database){
    self::$db = $database;
  }

  public function setImagen($imagen){
    // Elimina la imagen previa
    if(isset($this->id)){
     
      $this->borrarImagen();

    }

    if($imagen){
      return $this->imagen = $imagen;
    }
  }

  public function borrarImagen(){
     // Comprobar si existe la imagen
     $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
     if($existeArchivo){
       unlink(CARPETA_IMAGENES . $this->imagen);
     }
  }
  
  public function guardar(){
    if(!empty($this->id)){
      return $this->actualizar();
    }else{
      // debuguear("creare");
      return $this->crear();
    }
  }

  public function crear(){

    $atributos = $this->sanitizarDatos();
    
    /*join convierte arreglo en string  */
    $query = "INSERT INTO ".static::$tabla."(";
    $query .= join(",", array_keys($atributos));
    $query .= ") VALUES ('";
    $query .= join("','" ,array_values($atributos));
    $query .= " ')";

    $resultado = self::$db->query($query);
    
 

    // Mensaje exito
    if($resultado){
      header('Location:/administrador?resultado=1');
    }
   

  }

  public function actualizar(){
    $atributos = $this->sanitizarDatos();
    $valores = [];
    
    foreach ($atributos as $key => $value){
      $valores[] = "$key = '{$value}'";
    }       
    $query = "UPDATE ".static::$tabla." SET ";
    $query .= join(",",$valores );
    $query .= " WHERE id = ". self::$db->escape_string($this->id);
    $query  .= " LIMIT 1;"; 

    $resultado = self::$db->query($query);

    return $resultado;

  }

  public function eliminar(){
    $query = "DELETE FROM ".static::$tabla." where id = ". self::$db->escape_string($this->id)." LIMIT 1";
    $resultado = self::$db->query($query);
    return $resultado;
  }

  public function atributos(){
    $atributos = [];
    foreach(static::$columnasDB as $columna){
      if($columna == 'id') continue;
      $atributos[$columna] = $this->$columna;
    }

    return $atributos;
    
  }
  public function sanitizarDatos(){
    $atributos = $this->atributos();
    $sanitizado = [];
    foreach($atributos as $key => $value){
      $sanitizado[$key] = self::$db->escape_string($value);
    }

    return $sanitizado;
  }

  public static function getErrores(){
    return static::$errores;
  }

  public function validar(){
    static::$errores = [];
    return static::$errores;
  }

  public static function all(){
    $query = "SELECT * FROM " . static::$tabla;
    // debuguear($query);
    $resultado = self::consultarQuery($query);

    
    return $resultado;
  }

  public static function find($id){
    $query = "SELECT * FROM ".static::$tabla." where id= $id limit 1";

    $resultado = self::consultarQuery($query);

    return array_shift( $resultado); /* devuleve la primera posicion de un arreglo */
  }
  public static function get($cantidad){
    $query = "SELECT * FROM ".static::$tabla." LIMIT $cantidad";
   

    $resultado = self::consultarQuery($query);

    return  $resultado; /* devuleve la primera posicion de un arreglo */
  }

  public static function consultarQuery($query){

    $resultado = self::$db->query($query);

    // Iterar los resultados
    $array =[];
    while ($registro = $resultado->fetch_assoc()){
      $array[] = static::crearObjeto($registro);
    }

    // liberar memory
    $resultado->free();

    // retornar valores
    return $array;
  }

  public static function crearObjeto($registro){
    $objeto = new static; /* nuevo objeto */

    foreach($registro as $key => $value){
      if(property_exists($objeto,$key)){
        $objeto->$key = $value;
      }
    }

    return $objeto;
  }
 
  // Sincronizar el objeto en memoria
  public function sincronizar($args){
    foreach($args as $key => $value){
      if(property_exists($this, $key) && !is_null($value)){
        $this->$key = $value;
      } 
    }
  }


}

?>