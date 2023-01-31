<?php 
//agregamos esa ruta porque este archivo esta siendo llamdado en index y index manda a llamar todo es por eso que se agrega asi la ruta

use App\Propiedad;

  if($_SERVER["SCRIPT_FILENAME"] == 'C:/xampp/htdocs/PHP/POO/bienesraices_inicio_POO/index.php'){
    $propiedades = Propiedad::get($limite); 
  }else{
    $propiedades = Propiedad::all();

  }

?>

<div class="contenedor-anuncios">
  
<?php

foreach($propiedades as $propiedad): ?>  
<div class="anuncio">
    <img loading="lazy" src="<?php echo BASE_URL ."imagenes/".$propiedad->imagen ?>" alt="anuncio">
    <div class="contenido-anuncio">
      <h3><?php echo $propiedad->titulo ?></h3>
      <p><?php echo $propiedad->descripcion ?></p>
      <p class="precio">$<?php echo $propiedad->precio ?></p>
      <ul class="iconos-caracteristicas">

        <li>
          <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
          <p><?php echo $propiedad->wc ?></p>
        </li>

        <li>
          <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
          <p><?php echo $propiedad->estacionamiento ?></p>
        </li>

        <li>
          <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono wc">
          <p><?php echo $propiedad->habitaciones ?></p>
        </li>

      </ul>
      <a href="anuncio.php?id=<?php echo $propiedad->id?>" class="boton boton-amarillo-block ">Ver Propiedad </a>
    </div><!-- contenido anuncio -->
  </div><!-- anuncio -->
  <?php endforeach;?> 
</div><!-- contenedor anuncios -->