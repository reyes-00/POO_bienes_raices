<?php

require_once __DIR__ . "/../includes/app.php"; 
use MVC\Router;
use Controller\LoginController;
use Controller\PaginasController;
use Controller\PropiedadController;
use Controller\VendedoresController;

$router = new Router();
// $router->get();

// Propiedades
$router->get('/administrador', [PropiedadController::class,'index']);

$router->get('/propiedades/crear',[PropiedadController::class,'crear']);
$router->post('/propiedades/crear',[PropiedadController::class,'crear']);
$router->get('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
$router->post('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
$router->post('/propiedades/eliminar',[PropiedadController::class,'eliminar']);

// Vendedores
$router->get('/vendedores/crear',[VendedoresController::class,'crear']);
$router->post('/vendedores/crear',[VendedoresController::class,'crear']);
$router->get('/vendedores/actualizar',[VendedoresController::class,'actualizar']);
$router->post('/vendedores/actualizar',[VendedoresController::class,'actualizar']);
$router->post('/vendedores/eliminar',[VendedoresController::class,'eliminar']);

// Home pages
$router->get('/',[PaginasController::class,'home']);
$router->get('/anuncio',[PaginasController::class,'anuncio']);
$router->get('/anuncios',[PaginasController::class,'anuncios']);
$router->get('/nosotros',[PaginasController::class,'nosotros']);
$router->get('/admin',[PaginasController::class,'admin']);
$router->get('/contacto',[PaginasController::class,'contacto']);
$router->post('/contacto',[PaginasController::class,'contacto']);
$router->get('/blog',[PaginasController::class,'blog']);

// Login y Authentication
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);
$router->get('/cerrar',[LoginController::class,'cerrar']);


$router->comporbarRutas();