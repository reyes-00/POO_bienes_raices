<?php

namespace MVC;

use Intervention\Image\Gd\Decoder;

class Router{

  public $rutasGET=[];
  public $rutasPOST=[];

  public function get($url, $fn){
    $this->rutasGET[$url] = $fn;
    
  }
  public function post($url, $fn){
    
    $this->rutasPOST[$url] = $fn;
  }
  public function comporbarRutas(){
    session_start();
    $auth = $_SESSION['login'] ?? null ;
    // Rutas protegidas  
    $rutas_protegidas = ['/administrador','/propiedades/crear','/propiedades/actualizar','/vendedores/crear','/vendedores/actualizar',];

    $urlActual = $_SERVER['PATH_INFO'] ?? '/';
 
    $metodo = $_SERVER['REQUEST_METHOD'];

    // proteger rutas
    if(in_array($urlActual, $rutas_protegidas) && !$auth){
      header('Location: /');
    }
    
    if($metodo === 'GET'){ 
      $fn = $this->rutasGET[$urlActual] ?? null;
    }else{
      $fn = $this->rutasPOST[$urlActual] ?? null;

    }

    if($fn){
      call_user_func($fn,$this);
    }else{
      echo "Pagina no encontrada";
    }
  }
  public function render($view,$datos = []){
    
    foreach($datos as $key => $value){
      $$key = $value;
    }

    // Guarda en memoria la vista que vamos agregar al layout
    ob_start();
    include __DIR__ . "/views/$view.php";

    $contenido = ob_get_clean(); /* Agregamos la vista a la variable $contenido y Limpiamos de la memoria la vista */


    include __DIR__ . "/views/layout.php"; /* Pasamos $contenido (vista) a layout */
  }
}