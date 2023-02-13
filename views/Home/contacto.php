<?php if($mensaje) : ?>
  <p class="alerta exito"><?php echo $mensaje ?></p>
<?php endif; ?>
<main class="contenedor seccion contenido-centrado">
    <picture>
      <source srcset="build/img/destacada3.webp" type="image/webp">
      <source srcset="build/img/destacada3.jpg" type="image/jpeg">
      <img src="build/img/destacada3.jpg" alt="destacada">
    </picture>

    <h2>Llene el formulario de contacto</h2>
    <form action="/contacto" class="formulario" method="POST">
      <fieldset>
        <legend>Informacion Personal</legend>
        <label  for="nombre">Nombre</label>
        <input type="text" id="nombre" placeholder="Tu nombre" name="nombre">

        <label  for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10" ></textarea>
      </fieldset>

      <fieldset>
        <legend>Información Sobre la Propiedad</legend>
        <label for="opciones">Vende o Compra</label>
        <select name="opciones" id="opciones">
          <option disabled selected>--Seleccione--</option>
          <option value="vende">Vende</option>
          <option value="compra ">Compra</option>
        </select>
        <label for="cantidad">Precio o Presupueto</label>
        <input type="number" name="cantidad" id="cantidad">
      </fieldset>

      <fieldset>
        <legend>Contacto</legend>
        <p>Como desea ser contactado</p>
        <div class="forma-contacto">
          <label for="contactar-telefono">Telefono</label>
          <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
          <label for="contactar-email">Email</label>
          <input name="contacto" type="radio" value="email" id="contactar-email">
        </div>
        <div class="contacto-info"></div>
        
      </fieldset>

      <input type="submit" value="Enviar" class="boton-verde">
    </form>
  </main>
