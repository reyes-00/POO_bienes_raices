<?php
  
  require "includes/app.php";

  incluirTemplate("header");

?>
  <main class="contenedor seccion contenido-centrado">
    <picture>
      <source srcset="build/img/destacada3.webp" type="image/webp">
      <source srcset="build/img/destacada3.jpg" type="image/jpeg">
      <img src="build/img/destacada3.jpg" alt="destacada">
    </picture>

    <h2>Llene el formulario de contacto</h2>
    <form action="" class="formulario">
      <fieldset>
        <legend>Informacion Personal</legend>
        <label  for="nombre">Nombre</label>
        <input type="text" id="nombre" placeholder="Tu nombre">
        
        <label  for="email">Nombre</label>
        <input type="email" id="email" placeholder="Tu email">
        
        <label  for="telefono">Telefono</label>
        <input type="number" id="telefono" placeholder="Tu telefono">
      
        <label  for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
      </fieldset>

      <fieldset>
        <legend>Información Sobre la Propiedad</legend>
        <label for="opciones">Vende o Compra</label>
        <select name="opciones" id="opciones">
          <option disabled selected>--Seleccione--</option>
          <option value="0">Vende</option>
          <option value="1">Compra</option>
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
        <p>Se eligio telefono eliga una fecha y hora</p>
        <label for="fecha">Fecha</label>
        <input type="date" id="fecha">
        <label for="hora">Hora</label>
        <input type="time" name="hora" id="hora">
      </fieldset>

      <input type="submit" value="Enviar" class="boton-verde">
    </form>
  </main>

<?php
    incluirTemplate("footer");
?>