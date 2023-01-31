<?php

if(!isset($_SESSION)){
  session_start();
} 
$auth = $_SESSION['login'] ?? null;

 

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo BASE_URL?>build/css/app.css">
  <title>Bienes raices</title>
  
</head>
  <header class="header <?php echo $inicio ? 'inicio' : ''  ?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="<?php echo BASE_URL?>">
          <img src="<?php echo BASE_URL?>build/img/logo.svg" alt="logo">
        </a>
          <!-- menu hamburgesa -->
        <div class="mobile-menu">
            <img src="<?php echo BASE_URL?>build/img/barras.svg" alt="icono menu">
        </div>
        <div class="derecha"> 
          <img class="dark-mode" src="<?php echo BASE_URL?>build/img/dark-mode.svg" alt="dark-mode">
          <nav class="navegacion">
            <a href="<?php echo BASE_URL?>nosotros.php">Nosotros</a>
            <?php if ($auth):?>
              <a href="<?php echo BASE_URL?>admin/index.php">Admin</a>
            <?php else: ?>
              <a href="<?php echo BASE_URL?>login.php">Admin</a>
            <?php endif; ?>
            <a href="<?php echo BASE_URL?>contacto.php">Contacto</a>
            <a href="<?php echo BASE_URL?>anuncios.php">Anuncios</a>
            <a href="<?php echo BASE_URL?>blog.php">Blog</a>
            <?php if ($auth):?>
              <a href="<?php echo BASE_URL?>cerrar.php">Cerrar sesion</a>
            <?php endif; ?>
          </nav>
        </div>

      </div> <!-- cierre barra -->
      <?php if ($inicio):  ?>
        <h1> Venta de casas y departamentos exclusivos de lujo </h1>
      <?php endif;?>
    </div>
  </header>