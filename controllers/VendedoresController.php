<?php

namespace Controller;
use MVC\Router;
use Model\Vendedor;
class VendedoresController{
  
  public static function crear(Router $router){
   $vendedor = new Vendedor();
   $errores=$vendedor->getErrores();

   if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // Crea una nueva instancia
    $vendedor = new Vendedor($_POST);
    
    // Validar
    $errores = $vendedor->validar();
    
    if(empty($errores)){
      // GUarda en la base de datos
      $resultado = $vendedor->guardar();
      
      // Mensaje exito
      if($resultado){
        header('Location: /index?resultado=1');
      }
    }  
    
  } 
   $router->render('vendedores/crear',[
    'vendedor' => $vendedor,
    'errores' =>$errores,
  ]);
  }
  
  public static function actualizar(Router $router){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){
      $vendedor = Vendedor::find($id); 
      $errores = $vendedor->getErrores();
      

    }else{
      header('Location:'. BASE_URL ."admin/index.php");
    }

    $vendedor = Vendedor::find($id);

    if($_SERVER["REQUEST_METHOD"] === "POST"){

      $vendedor->sincronizar($_POST);
      
      $errores = $vendedor->validar();
    
      if(empty($errores)){
        $resultado = $vendedor->guardar();
        if($resultado){
            header('Location:' .BASE_URL . '/index?resultado=2');
          }
        }
      }

    $router->render('vendedores/actualizar',[
      'vendedor' => $vendedor,
      'errores' =>$errores,
    ]);
  }

  public static function eliminar(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $id = ($_POST['id']);
      $id= filter_var($id,FILTER_VALIDATE_INT);
      
      if($id){
        $vendedor = Vendedor::find($id);
        $resultado = $vendedor->eliminar();
  
          if($resultado){
            header('Location:' .BASE_URL . '/administrador?resultado=3');
          }
        }
      
    }
    
  }
}

?>