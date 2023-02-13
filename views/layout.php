<?php 
 
if(!isset($_SESSION)){
    session_start();
}
 
$usuario = $_SESSION['login'] ?? false;
 
if(!isset($inicio)){
    $inicio = false;
}
 
 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/build/css/app.css">
  <title>Bienes raices</title>
  
</head>

  <header class="header <?php echo $inicio ? 'inicio' : '' ?>">

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
            <a href="<?php echo "/nosotros"?>">Nosotros</a>
              
              <a href="<?php echo "/login"?>">Admin</a>
            
              <!-- <a href="login.php">Admin</a> -->
            
            <a href="<?php echo "/contacto"?>">Contacto</a>
            <a href="<?php echo "/anuncios"?>">Anuncios</a>
            <a href="<?php echo "/blog"?>">Blog</a>
      
            <?php if($usuario): ?>
              <a href="/cerrar">Cerrar sesion</a>
            
            <?php endif; ?>
          </nav>
        </div>

      </div> <!-- cierre barra -->
      <?php if ($inicio):  ?>
        <h1> Venta de casas y departamentos exclusivos de lujo </h1>
      <?php endif;?>
    </div>
  </header>
 
<body>
  <?php echo $contenido; ?>
  
  <footer class="footer seccion">
    <div class="contenedor contenedor-footer">
      <nav class="navegacion-footer">
        <a href="/nosotros">Nosotros</a>
        <a href="contacto.php">Contacto</a>
        <a href="anuncios.php">Anuncios</a>
        <a href="blog.php">Blog</a>
      </nav>
    </div>
    <p class="copyright">Todos los derechos reservados &copy; <?php echo date('Y')?></p>
  </footer>


    <script src="build/js/bundle.min.js"></script>
  

</body>
</html>