<?php 

require_once "controllers/sistema/template.controller.php";
// ------ Rutas ------
require_once "controllers/sistema/enrutamiento.controller.php";



// ------ Sesion ------
require_once "models/sistema/sesion.modelo.php";
require_once "controllers/sistema/sesion.controller.php";

$template = new ControllerTemplate();
$template -> template();


?>