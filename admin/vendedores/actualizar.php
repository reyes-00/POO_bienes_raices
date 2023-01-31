<?php
require '../../includes/app.php';
use App\Vendedor;
$vendedor = new Vendedor;
estaAutenticado();


$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if($id){
  $vendedor = Vendedor::find($id); 
  $errores = $vendedor->getErrores();
  

}else{
  header('Location:'. BASE_URL ."admin/index.php");
}



// COnfiguracion de fecha actual
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City"); 

if($_SERVER["REQUEST_METHOD"] === "POST"){

  $vendedor->sincronizar($_POST);
  
  $errores = $vendedor->validar();

  
  if(empty($errores)){
   
      $resultado = $vendedor->guardar();
    


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
      <?php include '../../includes/templates/formulario_vendedor.php'; ?>
      <input type="submit" value="Actualizar" class="boton-verde">
    </form>
  </main>
 
<?php
     incluirTemplate("footer", $inicio = false, $crear = true);
?>