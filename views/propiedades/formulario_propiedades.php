
<fieldset>
        <legend>Información</legend>
        
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo" value="<?php echo s($propiedad->titulo); ?>">
        
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" placeholder="Precio" value="<?php echo s($propiedad->precio); ?>">
        
        <label for="imagen">Imagen</label>               
        <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
        <?php if($propiedad->imagen): ?>
          <img src="<?php echo BASE_URL . "imagenes/" .$propiedad->imagen;?>" alt="<?php echo $propiedad->imagen; ?>" class="imagen-mini">
      
        <?php endif ?>
        <label for="descripcion">Descripcion</label>
        <textarea  name="descripcion" id="descripcion" placeholder="Descripcion"><?php echo s($propiedad->descripcion); ?></textarea>
      </fieldset>

      <fieldset>
        <legend>Informacion habtaciones</legend>

        <label for="habitaciones">Habitaciones</label>
        <input type="number" name="habitaciones" id="habitaciones" placeholder="Habitaciones" value="<?php echo s($propiedad->habitaciones); ?>">
       
        <label for="wc">WC</label>
        <input type="number" name="wc" id="wc" placeholder="WC" value="<?php echo s($propiedad->wc); ?>">
 
        <label for="estacionamiento">Estacionamiento</label>
        <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Estacionamiento" value="<?php echo s($propiedad->estacionamiento); ?>">

      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        <select name="vendedorId">
          <option value="">--Selecciona--</option>
          <?php foreach($vendedores as $vendedor): ?>
            <option <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ""; ?> 
            value= "<?php echo s($vendedor->id);?>"><?php echo s($vendedor->nombre)." ". s($vendedor->apellidos) ;?></option>
          <?php endforeach; ?>
          
        </select>
      </fieldset>