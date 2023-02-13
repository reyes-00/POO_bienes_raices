<?php
namespace Controller;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController{


  public static function home(Router $router){
    $propiedades = Propiedad::get(3);
    $inicio = true;
    $router->render('Home/index',[
      'propiedades' => $propiedades,
      'inicio' => $inicio
    ]);
  }
  public static function anuncio(Router $router){
    $id = $_GET['id'];
    $inicio = false;
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $propiedad = Propiedad::find($id);
    $router->render('Home/anuncio',[
      'propiedad' => $propiedad,
      'inicio' => $inicio,
    ]);
  }
  public static function anuncios(Router $router){
    $inicio = false;
    $propiedades = Propiedad::all();
    $router->render('Home/anuncios',[
      'propiedades' => $propiedades,
      'inicio' => $inicio,
    ]);
  }
  public static function nosotros(Router $router){
    $inicio = false;

    $router->render('Home/nosotros',[
      'inicio' => $inicio,
    ]);
  }

  public static function contacto(Router $router){
    $inicio = false;
    $mensaje = null;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Crear una instancia de phpmailer
      $phpmailer = new PHPMailer();

      // Configurar el protocolo para envio de email
      $phpmailer->isSMTP();
      $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
      $phpmailer->SMTPAuth = true;
      $phpmailer->Port = 2525;
      $phpmailer->Username = 'e6954ad4db04b8';
      $phpmailer->Password = 'c6746fe979f696';
      $phpmailer->SMTPSecure = 'tls';

      // Configurar el contenido del email

      $phpmailer->setFrom('ejemplo@ejemplo.com'); /* Persona que envia el email */
      $phpmailer->addAddress('admin@bienesraices.com','Bienesraices'); /* Direccion a donde se enviara el email */
      $phpmailer->Subject ="Tienes un nuevo mensje";

      // Habilitar html
      $phpmailer->isHTML(true);
      $phpmailer->CharSet="UTF-8";

      // Definir contenido
      $contenido = "<html>";
      $contenido .= "<p> Tienes un nuevo mensaje</p>";
      $contenido .= "<p>El Nombre es: ".$_POST['nombre'] . "</p>";
      $contenido .= "<p>El Mensaje es: ".$_POST['mensaje'] . "</p>";
      $contenido .= "<p>La Cantida es: $".$_POST['cantidad'] . "</p>";
      $contenido .= "<p>Eligio: ".$_POST['opciones'] . "</p>";
      
      if($_POST['contacto'] === 'telefono'){
        $contenido .= "<p>El Telefono es: ".$_POST['telefono'] . "</p>";
        $contenido .= "<p>La Fecha es: ".$_POST['fecha'] . "</p>";
        $contenido .= "<p>La Hora fue: ".$_POST['hora'] . "</p>";
        
      }else{
        $contenido .= "<p>El Email es: ".$_POST['email'] . "</p>";  
      }
      $contenido .= "</html>";

      $phpmailer->Body = $contenido;
      $phpmailer->AltBody = "Esto es texto alternativo sin html";

      if($phpmailer->send()){
        $mensaje = "Mensaje enviado correctamente";
      }else{
        $mensaje = "Mensaje no enviado";
      }
    }

    $router->render('Home/contacto',[
      'inicio' => $inicio,
      'mensaje' => $mensaje
    ]);
  }
  public static function blog(Router $router){
    $inicio = false;

    $router->render('Home/blog',[
      'inicio' => $inicio,
    ]);
  }
  public static function cerrar(){

  }

}

?>