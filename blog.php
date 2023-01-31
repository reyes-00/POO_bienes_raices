<?php
  
  require "includes/app.php";

  incluirTemplate("header");

?>
  <main class="contenedor seccion contenido-centrado">
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
          <a href="entrada.html">
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
          <a href="entrada.html">
            <h4>Guia para la decoracion de tu Hogar</h4>
            <p>Escrito el: <span>20/10/22</span> Por: <span>Admin</span></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint asperiores repudiandae rerum adipisci magni.</p>
          </a>
        </div>
      </article>
    </section>

  </main>

<?php
  incluirTemplate("footer");
?>