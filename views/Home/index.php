
<main class="contenedor seccion">
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
  </main>
  <section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>

    <?php
      
      include __DIR__.'./anuncios.php'; 
    ?>
    <div class="ver-todas alinear-derecha">
      <a href="/anuncios" class="boton-verde">Ver todas</a>
    </div>
  </section>
  <section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
    <a href="contacto.php" class="boton boton-amarillo"> Contactános</a>
  </section>
  <div class="contenedor seccion seccion-inferior">
    <section class="blog">
      <h3>Nuestro blog</h3>
      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpg" type="image/jpeg">
            <img src="build/img/blog1.jpg" alt="blog_1" loading="lazy">
          </picture>
        </div>
        <div class="texto-entrada">
          <a href="entrada.php">
            <h4>Terraza en el techo de tu casa</h4>
            <p>Escrito el: <span>20/10/22</span> Por: <span>Admin</span></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint asperiores repudiandae rerum adipisci magni.</p>
          </a>
        </div>
      </article>
      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog2.webp" type="image/webp">
            <source srcset="build/img/blog2.jpg" type="image/jpeg">
            <img src="build/img/blog2.jpg" alt="blog_1" loading="lazy">
          </picture>
        </div>
        <div class="texto-entrada">
          <a href="entrada.php">
            <h4>Guia para la decoracion de tu Hogar</h4>
            <p>Escrito el: <span>20/10/22</span> Por: <span>Admin</span></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint asperiores repudiandae rerum adipisci magni.</p>
          </a>
        </div>
      </article>
    </section>

    <section class="testimoniales">
      <h3>Testimoniales</h3>
      <div class="testimonial">
        <blockquote>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, quibusdam sint aut odio quia perferendis voluptates reiciendis.
        </blockquote>
        <p>Arturo Reyes</p>
      </div>
    </section>
  </div>