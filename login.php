<?php

require_once "includes/funciones.php";
require_once "includes/config/database.php";
incluirTemplate("header");

$db = conectarDB();

$errores = [];

if($_SERVER["REQUEST_METHOD"] == 'POST'){
  
  $email = mysqli_real_escape_string($db,filter_var( $_POST['email'],FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db,$_POST['password']);


  if(!$email){
    $errores[]= "El email es requerido";    
  }

  if(!$password){
    $errores[]= "El password requerido"; 
  }

  if(empty($errores)){
    // Comprobar que el correo exista
    $query = "SELECT * from usuarios where email = '$email' limit 1;";

    $resultado = mysqli_query($db, $query);

    $email = mysqli_fetch_assoc($resultado);

    if($email){
       $password_usuario = password_verify($password, $email['password']);
       
       if($password_usuario){
        // Autenticación
        if(!$_SESSION){
          session_start();
          // Llenar el arreglo de session
          $_SESSION['usuario'] = $email['email'];
          $_SESSION['login'] = true;
          header('Location:'.BASE_URL . 'admin/index.php');
        }

        // debuguear($_SESSION);
        // exit;
       }

    }else{
      $errores[] = "EL usuario no existe";
    }
  }
  
}

?>
<form action="" class="formulario contenido-centrado centro" method="POST" enctype="multipart/form-data">
  <?php foreach($errores as $error): ?>
    <div class="alerta errores"><?php echo $error?></div>
  <?php endforeach; ?> 
  <fieldset>
    <legend>Inicia Sesión</legend>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Tu Email">

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Tu password">

    <input type="submit" value="Inicia Sesión" class="boton-verde">
</form>
</fieldset>

<?php
incluirTemplate("footer", $inicio = false, $crear = true);
?>