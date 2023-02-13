<?php

namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {

  public static function index(Router $router) {
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();
    $mensaje = "";
    $inicio = false;

    $router->render('index',[
      'inicio'=>$inicio,
      'propiedades' => $propiedades,
      'vendedores' => $vendedores,
      'mensaje' => $mensaje,
    ]);
  }
  public static function crear(Router $router){
    $propiedad = new Propiedad();
    $vendedores = Vendedor::all();
    $errores  = $propiedad->getErrores();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Crear una instancia 
      $propiedad = new Propiedad($_POST);
     
      
      // Subida de archivos
      $nombreImagen = md5(uniqid(rand(),true))."jpg";

      // Realizar un resize a la imagen
      if($_FILES['imagen']['tmp_name']){
        $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
        $propiedad->setImagen($nombreImagen);
      }

      // validar
      $errores = $propiedad->validar(); 
     
      if(empty($errores)){
        // Crear carpetaImagenes
        if(!is_dir(CARPETA_IMAGENES)){
          mkdir(CARPETA_IMAGENES);
        }

        // Guardar la imagen
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // Guardar en la db;
        $resultado = $propiedad->guardar();

     }
    }

    $router->render('propiedades/crear',[
      'errores' => $errores,
      'propiedad' => $propiedad,
      'vendedores' => $vendedores,
    ]);
  }
  public static function actualizar(Router $router){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $propiedad = Propiedad::find($id);
    $vendedores = Vendedor::all();
    $errores = $propiedad->getErrores();
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){

      $propiedad->sincronizar($_POST);
      
      $errores = $propiedad->validar();
      
      // Nombre image
      $nombreImagen = md5( uniqid(rand(),true) ) . ".jpg";
      
      //Pasamos el nombre al objeto Propiedad 
      if($_FILES['imagen']['tmp_name']){
        $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
        $propiedad->setImagen($nombreImagen);
       
      }
      
      if(empty($errores)){
        if($_FILES['imagen']['tmp_name']){
          $image->save(CARPETA_IMAGENES . $nombreImagen);
        }
          $resultado = $propiedad->guardar();
        
          if($resultado){
            header('Location: /administrador?resultado=2');
          }
        }
      }
      

    $router->render('/propiedades/actualizar',[
      'propiedad'=>$propiedad,
      'errores'=>$errores,
      'vendedores' => $vendedores
    ]);
  }

  public static function eliminar(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $id = ($_POST['id']);
      $id= filter_var($id,FILTER_VALIDATE_INT);
      
      if($id){
        
          $propiedad = Propiedad::find($id);
          $resultado = $propiedad->eliminar();
          if($resultado){
            $propiedad->borrarImagen();
            header('Location:/administrador?resultado=3');
          }
       
        }

      }
  }
    

  
}
