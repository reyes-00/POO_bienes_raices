<?php
  
  require "includes/app.php";

  incluirTemplate("header");

?>
  <main class="contenedor seccion">
    <section class="seccion contenedor">
      <h2>Casas y Depas en Venta</h2>
      
      <?php  include 'includes/templates/anuncios.php'; ?>
      <div class="ver-todas alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver todas</a>
      </div>
    </section>
  </main>


<?php
  incluirTemplate("footer");
?>