<?php 
  require '../../includes/config/database.php';
  $db =  conectarDB(); 

  require_once "../../includes/funciones.php";
  incluirTemplate("header");

  $auth = estaAutenticado();
  // debuguear($auth);
  if(!$auth){
    header('Location:'.BASE_URL);
  }

  $query = "SELECT * FROM vendedores ORDER BY nombre ASC";
  $vendedores = mysqli_query($db, $query);


  $titulo = '';
  $precio = '';
  $descripcion = '';
  $habitaciones = '';
  $wc = '';
  $estacionamiento = '';
  $vendedorId = '';
  $creado = '';
  $errores = [];
  
  // COnfiguracion de fecha actual
  date_default_timezone_set('UTC');
  date_default_timezone_set("America/Mexico_City"); 
  

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $imagen = $_FILES['imagen'];

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    $medida = 1000 * 100;
   
    if($imagen['size'] > $medida){
      $errores[]="La imagen es muy grande";
    }

    if(!$titulo){
      $errores[] = "El titulo es requerido.";
    }
    if(!$precio){
      $errores[] = "El precio es requerido.";
    }

    if(!$imagen['name'] || $imagen['error']){
      $errores[]="La imagen es requerida";
    }
    if(strlen($descripcion) < 20 ){
      $errores[] = "La descripcion debe ser mayor a 20 caracteres.";
    }
    if(!$descripcion){
      $errores[] = "La descripcion es requerida.";
    }
    if(!$habitaciones){
      $errores[] = "La habitacion es requerido.";
    }
    if(!$wc){
      $errores[] = "El wc es requerido.";
    }
    if(!$estacionamiento){
      $errores[] = "El estacionamiento es requerido.";
    }
    if(!$vendedorId){
      $errores[] = "El vendedor es requerido.";
    }

    if(empty($errores)){

      // Creamos la carpeta

      $carpetaImagenes = '../../imagenes/';

      if(!is_dir($carpetaImagenes)){
        mkdir($carpetaImagenes);
      }
      
      $nombreImagen = md5( uniqid(rand(),true) ) . ".jpg";
      
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes .  $nombreImagen);
      

      $query = "INSERT INTO propiedades(titulo,precio,imagen,descripcion,habitaciones,wc,estacionamiento,vendedorId,creado) 
      VALUES ('$titulo','$precio','$nombreImagen','$descripcion','$habitaciones','$wc','$estacionamiento','$vendedorId','$creado');";
     
      $resultado = mysqli_query($db,$query);
  
      if($resultado){
        header('Location:' .BASE_URL . 'admin/index.php?resultado=1');
      }
    }  
 
  }


?>
  <main class="contenedor seccion">
    <a href="<?php echo BASE_URL ?>admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error) : ?>
      <div class="alerta errores">
        <?php echo $error;?>
      </div>   
      <?php endforeach; ?>
    
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>Información</legend>
        
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo" value="<?php echo $titulo; ?>">
        
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" placeholder="Precio" value="<?php echo $precio; ?>">
        
        <label for="imagen">Imagen</label>               
        <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
      
        <label for="descripcion">Descripcion</label>
        <textarea  name="descripcion" id="descripcion" placeholder="Descripcion"><?php echo $descripcion; ?></textarea>
      </fieldset>

      <fieldset>
        <legend>Informacion habtaciones</legend>

        <label for="habitaciones">Habitaciones</label>
        <input type="number" name="habitaciones" id="habitaciones" placeholder="Habitaciones" value="<?php echo $habitaciones; ?>">
       
        <label for="wc">WC</label>
        <input type="number" name="wc" id="wc" placeholder="WC" value="<?php echo $wc; ?>">
 
        <label for="estacionamiento">Estacionamiento</label>
        <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Estacionamiento" value="<?php echo $estacionamiento; ?>">

      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        
        <select name="vendedor">
          <option value="">--Selecciona--</option>
          <?php foreach ($vendedores as $vendedor): ?>
          <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id'];?>"><?php echo $vendedor['nombre'] ." ". $vendedor['apellidos'];?></option>
          <?php endforeach;?>
        </select>
      </fieldset>

      <input type="submit" value="Crear" class="boton-verde">
    </form>
  </main>
 
<?php
     incluirTemplate("footer", $inicio = false, $crear = true);
?>