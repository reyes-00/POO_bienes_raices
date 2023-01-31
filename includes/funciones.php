<?php

define('TEMPLATE_URL',__DIR__ .'/templates');
define('FUNCIONES_URL',__DIR__.'/funciones.php'); 
define('BASE_URL','http://localhost/PHP/POO/bienesraices_inicio_POO/'); 
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate($nombre, $inicio = false, $crear = false) {
  include TEMPLATE_URL."/$nombre.php";
}

function estaAutenticado(){
  session_start();
  if(!$_SESSION['login']){
    header('Location:'. BASE_URL);
  }
  
}

function debuguear($valor){
  echo"<pre>";
  var_dump($valor);
  echo"</pre>";
 
}


// Escapa el HTML
function s($html){
  $s = htmlspecialchars($html);

  return $s;
}