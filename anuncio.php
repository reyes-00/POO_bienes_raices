<?php
  
  require "includes/app.php";



  use App\Propiedad;
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);
  
  if($id){
   $propiedad = Propiedad::find($id);
    
  }else{
    header('Location:'. BASE_URL);
  }

  incluirTemplate("header");

?>
  <main class="contenedor seccion contenido-centrado">
    <section class="seccion contenedor">
      <h2><?php echo $propiedad->titulo?></h2>
      <div class="contenedor-anuncio">
       
        <img loading="lazy" src="<?php echo BASE_URL. "imagenes/". $propiedad->imagen?>" alt="anuncio">
      
       <div class="contenido-texto anuncio">
        <p class="precio"><?php echo $propiedad->precio?></p>
        <ul class="iconos-caracteristicas">
              
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
            <p><?php echo $propiedad->wc?></p>
          </li>
          
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
            <p><?php echo $propiedad->estacionamiento?></p>
          </li>
          
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono wc">
            <p><?php echo $propiedad->habitaciones?></p>
          </li>

        </ul>

        <p>
        <?php echo $propiedad->descripcion?>
        </p>
        <a href="anuncios.php" class="boton boton-amarillo-block ">Volver </a>
       </div>
      </div><!-- contenedor anuncios -->
     
    </section>
  </main>


<?php
  incluirTemplate("footer");
?>