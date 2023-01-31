<?php 
  require '../../includes/app.php';
  // use App\Propiedad;
  use App\Vendedor;

  estaAutenticado();
  
  $vendedor = new  Vendedor();
  // $vendedores=Vendedor::all();

  $errores = Vendedor::getErrores();  
 
  
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
    
    <form action="" class="formulario" method="POST">
      <?php include '../../includes/templates/formulario_vendedor.php' ?>
      <input type="submit" value="Crear" class="boton-verde">
    </form>
  </main>
 
<?php


     incluirTemplate("footer", $inicio = false, $crear = true);
?>