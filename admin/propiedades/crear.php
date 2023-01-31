<?php 
  use Intervention\Image\ImageManagerStatic as Image;
  require '../../includes/app.php';
  use App\Propiedad;
  use App\Vendedor;

  estaAutenticado();
  
  $propiedad = new  Propiedad();
  $vendedores=Vendedor::all();

  $errores = Propiedad::getErrores();  
 
  
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // debuguear($propiedad);
    // Crea una nueva instancia
    $propiedad = new Propiedad($_POST);

    // Nombre image
    $nombreImagen = md5( uniqid(rand(),true) ) . ".jpg";

    //Pasamos el nombre al objeto Propiedad 
    if($_FILES['imagen']['tmp_name']){
      $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
      $propiedad->setImagen($nombreImagen);
      
    }
    
    // Validar
    $errores = $propiedad->validar();
    
    if(empty($errores)){
      
      // Crear carpetaImagenes
      if(!is_dir(CARPETA_IMAGENES)){
        mkdir(CARPETA_IMAGENES);
      }
      // Guarda la imagen
      $image->save(CARPETA_IMAGENES . $nombreImagen); 
      
      // GUarda en la base de datos
      $resultado = $propiedad->guardar();
      
      // Mensaje exito
      if($resultado){
        header('Location:' .BASE_URL . 'admin/index.php?resultado=1');
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
      <?php include '../../includes/templates/formulario_propiedades.php' ?>
      <input type="submit" value="Crear" class="boton-verde">
    </form>
  </main>
 
<?php


     incluirTemplate("footer", $inicio = false, $crear = true);
?>