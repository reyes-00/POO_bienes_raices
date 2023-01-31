<?php 
  require '../includes/app.php';
  // Session
 estaAutenticado();


  use App\Propiedad;
  use App\Vendedor;
  
  incluirTemplate("header");

 
  $propiedades = Propiedad::all();
  $vendedores = Vendedor::all();

  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = ($_POST['id']);
    $id= filter_var($id,FILTER_VALIDATE_INT);
    
    if($id){
      if($_POST['tipo'] === 'propiedad'){
        $propiedad = Propiedad::find($id);
        $resultado = $propiedad->eliminar();
        if($resultado){
          $propiedad->borrarImagen();
          header('Location:' .BASE_URL . 'admin/index.php?resultado=3');
        }
     
      }

      if($_POST['tipo']=== 'vendedor'){
        $vendedor = Vendedor::find($id);
        $resultado = $vendedor->eliminar();

        if($resultado){
          header('Location:' .BASE_URL . 'admin/index.php?resultado=3');
        }
      }

      
      
    }
  }
  

  


  $mensaje = $_GET['resultado'] ?? null;
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
        <?php foreach($propiedades as $res) :  $idpropiedad = $res->id;?>
        <tr>
          <td><?php echo $res->id?></td>
          <td><?php echo $res->titulo?></td>
          <td>
            <img class="imagen-tabla" src= <?php echo BASE_URL . "imagenes/";echo $res->imagen;?> alt="imagen"></td>
          
          <td>$ <?php echo $res->precio?></td>
          <td>
            <form action="" method="POST">
              <input type="hidden" name="id" value="<?php echo $res->id ?>">
              <input type="hidden" name="tipo" value="propiedad">
              <input type="submit" value="Eliminar" class="boton-rojo-block w-100">
            </form>
            <a href="<?php echo BASE_URL ."admin/propiedades/actualizar.php?id=$idpropiedad"?>" class="boton-verde-block">Actualizar</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

    <h1>Vendedores</h1>
    <a href="<?php echo BASE_URL ?>admin/vendedores/crear.php" class="boton boton-verde">Crear Vendedor</a>
    <table class="propiedades">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Telefono</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($vendedores as $res) :  $idvendedor = $res->id;?>
        <tr>
          <td><?php echo $res->id?></td>
          <td><?php echo $res->nombre?></td>        
          <td><?php echo $res->apellidos?></td>
          <td><?php echo $res->telefono ?></td>
          <td>
            <form action="" method="POST">
              <input type="hidden" name="id" value="<?php echo $res->id ?>">
              <input type="hidden" name="tipo" value="vendedor">
              <input type="submit" value="Eliminar" class="boton-rojo-block w-100">
            </form>
            <a href="<?php echo BASE_URL ."admin/vendedores/actualizar.php?id=$idvendedor"?>" class="boton-verde-block">Actualizar</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </main>
<?php
    incluirTemplate("footer", $inicio = true);
?>