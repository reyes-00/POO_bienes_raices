<?php require 'includes/config/database.php'; 
//agregamos esa ruta porque este archivo esta siendo llamdado en index y index manda a llamar todo es por eso que se agrega asi la ruta

$db = conectarDB();

if(isset($limite)){
  $query = "SELECT * FROM propiedades LIMIT $limite;";
}else{
  $query = "SELECT * FROM propiedades;";
}

$resultado = mysqli_query($db, $query);


?>

<div class="contenedor-anuncios">
<?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>  
<div class="anuncio">
    <img loading="lazy" src="<?php echo BASE_URL ."imagenes/".$propiedad['imagen'] ?>" alt="anuncio">
    <div class="contenido-anuncio">
      <h3><?php echo $propiedad['titulo'] ?></h3>
      <p><?php echo $propiedad['descripcion'] ?></p>
      <p class="precio">$<?php echo $propiedad['precio'] ?></p>
      <ul class="iconos-caracteristicas">

        <li>
          <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
          <p><?php echo $propiedad['wc'] ?></p>
        </li>

        <li>
          <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
          <p><?php echo $propiedad['estacionamiento'] ?></p>
        </li>

        <li>
          <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono wc">
          <p><?php echo $propiedad['habitaciones'] ?></p>
        </li>

      </ul>
      <a href="anuncio.php?id=<?php echo $propiedad['id']?>" class="boton boton-amarillo-block ">Ver Propiedad </a>
    </div><!-- contenido anuncio -->
  </div><!-- anuncio -->
  <?php endwhile;?> 
</div><!-- contenedor anuncios -->