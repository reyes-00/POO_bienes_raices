
<main class="contenedor seccion">
    <a href="/index" class="boton boton-verde">Volver</a>
    <h1>Crear Vendedor</h1>
    <?php 
     
       foreach($errores as $error){
        echo "<div class='alerta errores'>";
        echo $error;
        echo "</div>" ;

       
      }
    ?>  
    <form class="formulario" action="" method="POST" >
        <?php include __DIR__ . "./formulario_vendedores.php"; ?>

        <input type="submit" value="Crear" class="boton-verde">
      </form>
  </main>
 
