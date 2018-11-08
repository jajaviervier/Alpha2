<?php 

require_once "controllers/sistema/template.controller.php";
// ------ Rutas ------
require_once "controllers/sistema/enrutamiento.controller.php";

// ------ Sesion ------
require_once "models/sistema/sesion.modelo.php";
require_once "controllers/sistema/sesion.controller.php";


//Modulos Log

//-- Funcionarios
require_once "controllers/funcionarios/funcionarios.controller.php";
require_once "models/funcionarios/funcionarios.modelo.php";

//-- Funcionarios
require_once "controllers/funcionarios/funcionarios.controller.php";
require_once "models/funcionarios/funcionarios.modelo.php";


//-- Funcionarios
$template = new ControllerTemplate();
$template -> template();


?>