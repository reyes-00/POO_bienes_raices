<?php 

namespace Model;

class Usuario extends ActiveRecord{
  // Base de datos 
  protected static $tabla = 'usuarios';
  protected $columansDB = ['id','email','password'];

  public $id;
  public $email;
  public $password;


  public function __construct($args=[]) {
    $this->id = $args['id'] ?? null;
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
  }
  
  public function validarFormulario(){
    
    if (!$this->email) {
      self::$errores[] = "El email es requerido";
    }
  
    if (!$this->password) {
      self::$errores[] = "El password requerido";
    }

    return self::$errores;
  }

  public function existeUsuario(){
    $query = "SELECT * FROM " . self::$tabla . " WHERE email = " . "'$this->email'" . " limit 1";
    $resultado = self::$db->query($query);

    if(!$resultado->num_rows){
      self::$errores[]="El usuario no exisdddssssste";
      return;
    }
    return $resultado;
  }

  public function comprobarPassword($resultado){
    $usuario = $resultado->fetch_object();
    $autenticado = password_verify($this->password,$usuario->password);

    if(!$autenticado){
      self::$errores[] = 'EL password es incorrecto';
    }
    return $autenticado;
  }

  public function autenticado(){
    session_start();
    // Llenar el arreglo de session
    $_SESSION['usuario'] = $this->email;
    $_SESSION['login'] = true;

    header("Location: /administrador");
  }
}