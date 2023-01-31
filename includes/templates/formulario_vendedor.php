<fieldset>
  <legend>Información del Vendedor</legend>

  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" placeholder="Titulo" value="<?php echo s($vendedor->nombre); ?>">

  <label for="apellidos">Apellidos</label>
  <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo s($vendedor->apellidos); ?>">

  <label for="telefono">Telefono</label>
  <input type="number" name="telefono" id="telefono" placeholder="telefono" value="<?php echo s($vendedor->telefono); ?>">


</fieldset>