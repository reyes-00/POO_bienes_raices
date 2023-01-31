<?php
require '../../includes/app.php';
use Intervention\Image\ImageManagerStatic as Image;

use App\Propiedad;
use App\Vendedor;

estaAutenticado();


$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if($id){
  
  $propiedad = Propiedad::find($id);  
  $vendedores = Vendedor::all();

  $errores = $propiedad->getErrores();
  

}else{
  header('Location:'. BASE_URL ."admin/index.php");
}



// COnfiguracion de fecha actual
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City"); 

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
        header('Location:' .BASE_URL . 'admin/index.php?resultado=2');
      }
    }
  }
  

  incluirTemplate("header");
?>

<main class="contenedor seccion">
    <a href="<?php echo BASE_URL ?>admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error) : ?>
      <div class="alerta errores">
        <?php echo $error;?>
      </div>   
      <?php endforeach; ?>
    
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
      <?php include '../../includes/templates/formulario_propiedades.php'; ?>
      <input type="submit" value="Actualizar" class="boton-verde">
    </form>
  </main>
 
<?php
     incluirTemplate("footer", $inicio = false, $crear = true);
?>