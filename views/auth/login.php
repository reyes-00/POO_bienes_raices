<form action="/login" class="formulario contenido-centrado centro" method="POST" enctype="multipart/form-data">
  <?php foreach ($errores as $error) : ?>
    <div class="alerta errores"><?php echo $error ?></div>
  <?php endforeach; ?>
  <fieldset>
    <legend>Inicia Sesión</legend>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Tu Email">

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Tu password">

    <input type="submit" value="Inicia Sesión" class="boton-verde">
  </fieldset>
</form>