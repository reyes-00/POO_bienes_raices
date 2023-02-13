
  <main class="contenedor seccion">
    <a href="/index" class="boton boton-verde">Volver</a>
    <h1>Crear</h1>
    <?php 
      if(!empty($errores)){
       foreach($errores as $error){
        echo "<div class='alerta errores'>";
        echo $error;
        echo "</div>" ;

       }
      }
    ?>  
    <form class="formulario" action="" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . "./formulario_propiedades.php"; ?>

        <input type="submit" value="Crear" class="boton-verde">
      </form>
  </main>
 
