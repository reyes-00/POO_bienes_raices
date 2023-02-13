<?php

namespace Controller;
use MVC\Router;
use Model\Usuario;
use SessionHandler;

class LoginController{

  public static function login(Router $router){
    $inicio = false;
    $usuario = new Usuario();
    $errores = $usuario->getErrores();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $usuario = new Usuario($_POST);

      $errores = $usuario->validarFormulario();
     
      if(empty($errores)){
        $resultado = $usuario-> existeUsuario();

        if(!$resultado){
          $errores  = Usuario::getErrores();
          
        }else{
          // comprobar password
          $auth = $usuario->comprobarPassword($resultado);
          
          if($auth){
            $usuario->autenticado();
          }else{
            $errores  = Usuario::getErrores();
          }
        }
      }
    }

    $router->render('auth/login',[
      
      'errores' => $errores,
      'inicio' => $inicio,
    ]);
  }

  public static function cerrar(){
    session_start();
    $_SESSION = [];

    header('Location: /');
  }
}