<?php
 

  require '../includes/config/database.php';
  $db =  conectarDB();
  require "../includes/funciones.php";
  $mensaje = $_GET['resultado'] ?? null;
  
  $auth = estaAutenticado();
  // debuguear($auth);
  if(!$auth){
    header('Location:'.BASE_URL);
  }
  
  incluirTemplate("header");
 
  // Consulta para obtener los datos
  $query = "SELECT * FROM propiedades limit 5";
  $resultado = mysqli_query($db, $query);

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = ($_POST['id']);
    $id= filter_var($id,FILTER_VALIDATE_INT);
    
    if($id){
      
      // Eliminar imagen de la carpetaImagenes
      $query = "SELECT imagen FROM propiedades WHERE id = $id";
      $respuesta = mysqli_query($db,$query);
      $removeImage = mysqli_fetch_assoc($respuesta);
      unlink('../imagenes/' . $removeImage['imagen']);
      
      // Eliminar registro de la db
      $query = "DELETE FROM propiedades where id = $id limit 1";
      $resultado = mysqli_query($db, $query);

      if($resultado){
        header('Location:' .BASE_URL . 'admin/index.php?resultado=3');
      }

      

    }
  }
  
  ?>
  <main class="contenedor seccion">
    <a href="<?php echo BASE_URL ?>admin/propiedades/crear.php" class="boton boton-verde">Crear</a>
    <?php if(intval($mensaje) === 1 ):?>
      <p class="alerta exito">Agregado Correctamente</p>
      <?php elseif(intval($mensaje) === 2 ):?>
      <p class="alerta exito">Actualizado Correctamente</p>
      <?php elseif(intval($mensaje) === 3 ):?>
      <p class="alerta exito">Eliminado Correctamente</p>
    <?php endif; ?>
    
    <table class="propiedades">
      <thead>
        <tr>
          <th>Id</th>
          <th>Titulo</th>
          <th>Imagen</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($resultado as $res) :  $idpropiedad = $res['id'];?>
        <tr>
          <td><?php echo $res['id']?></td>
          <td><?php echo $res['titulo']?></td>
          <td>
            <img class="imagen-tabla" src= <?php echo BASE_URL . "imagenes/";echo $res['imagen'];?> alt="imagen"></td>
          
          <td>$ <?php echo $res['precio']?></td>
          <td>
            <form action="" method="POST">
              <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
              <input type="submit" value="Eliminar" class="boton-rojo-block w-100">
            </form>
            <a href="<?php echo BASE_URL ."admin/propiedades/actualizar.php?id=$idpropiedad"?>" class="boton-verde-block">Actualizar</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </main>
<?php
    incluirTemplate("footer", $inicio = true);
?>