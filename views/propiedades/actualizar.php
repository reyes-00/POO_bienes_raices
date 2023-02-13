<main class="contenedor seccion">
    <a href="/administrador" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error) : ?>
      <div class="alerta errores">
        <?php echo $error;?>
      </div>   
      <?php endforeach; ?>
    
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
      <?php include __DIR__ . './formulario_propiedades.php';?>
      <input type="submit" value="Actualizar" class="boton-verde">
    </form>
  </main>