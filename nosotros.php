<?php
  
  require "includes/funciones.php";
  incluirTemplate("header");

?>
  <main class="contenedor seccion">
    <h2>Conoce Sobre Nosotros</h2>
    <div class="contenedor nosotros">
      <picture>
        <source srcset="build/img/nosotros.webp" type="image/webp">
        <source srcset="build/img/nosotros.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/nosotros.jpg" alt="nosotros">
      </picture>
      <div class="texto-nosotros">
        <p class="year">25 años de Experiencia</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto tenetur sunt voluptas quasi doloremque ex dolor maiores eveniet exercitationem, minima, et, neque delectus ipsa inventore? Aliquid cupiditate quis asperiores saepe.e delectus ipsa inventore? Aliquid cupiditate quis asperiores saepe.e delectus ipsa inventore? Aliquid cupiditate quis asperiores saepe.</p>
        <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto tenetur sunt voluptas quasi doloremque ex dolor maiores eveniet exercitationem, minima, et, neque delectus ipsa inventore? Aliquid cupiditate quis asperiores saepe.e delectus ipsa inventore? Aliquid cupiditate quis asperiores saepe.e delectus ipsa inventore? Aliquid cupiditate quis asperiores saepe. 
        </p>
      </div>
    </div>
  </main>
  <section class="contenedor seccion">
    <h1>Mas sobre Nosotros</h1>

    <div class="iconos-nosotros">
      <div class="icono">
        <img src="build/img/icono1.svg" alt="icono1" loading="lazy">
        <h3>Seguridad</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, repellat sequi voluptas sit, culpa quaerat aspernatur rerum nulla provident totam in possimus sunt aliquam exercitationem iure dolorem obcaecati omnis? Nesciunt!</p>
      </div>
      <div class="icono">
        <img src="build/img/icono2.svg" alt="icono1" loading="lazy">
        <h3>Precio</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, repellat sequi voluptas sit, culpa quaerat aspernatur rerum nulla provident totam in possimus sunt aliquam exercitationem iure dolorem obcaecati omnis? Nesciunt!</p>
      </div>
      <div class="icono">
        <img src="build/img/icono3.svg" alt="icono1" loading="lazy">
        <h3>Tiempo</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, repellat sequi voluptas sit, culpa quaerat aspernatur rerum nulla provident totam in possimus sunt aliquam exercitationem iure dolorem obcaecati omnis? Nesciunt!</p>
      </div>
    </div>
  </section>
  <?php
     incluirTemplate("footer");
  ?>