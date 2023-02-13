<?php $mensaje =$_GET['resultado'] ?? null;  ?>
<main class="contenedor seccion">
  <h1>Propiedades</h1>
    <a href="propiedades/crear" class="boton boton-verde">Crear</a>
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
            <img class="imagen-tabla" src="/imagenes/<?php echo $res->imagen;?>" ></td>
          
          <td>$ <?php echo $res->precio?></td>
          <td>
            <form action="/propiedades/eliminar" method="POST">
              <input type="hidden" name="id" value="<?php echo $res->id ?>">
              <input type="hidden" name="tipo" value="propiedad">
              <input type="submit" value="Eliminar" class="boton-rojo-block w-100">
            </form>
            <a href="<?php echo BASE_URL ."/propiedades/actualizar?id=$idpropiedad"?>" class="boton-verde-block">Actualizar</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      
    </table>

    <h1>Vendedores</h1>
    <a href="vendedores/crear" class="boton boton-verde">Crear Vendedor</a>
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
            <form action="/vendedores/eliminar" method="POST">
              <input type="hidden" name="id" value="<?php echo $res->id ?>">
              
              <input type="submit" value="Eliminar" class="boton-rojo-block w-100">
            </form>
            <a href="/vendedores/actualizar?id=<?php echo $idvendedor?>" class="boton-verde-block">Actualizar</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

</main>