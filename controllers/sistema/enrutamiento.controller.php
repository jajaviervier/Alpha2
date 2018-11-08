<?php 

class ControllerEnrutamiento {

	public function enrutamiento() {

		$ruta = $_GET["ruta"];

		if ($ruta == "home" ||
			$ruta == "salir") {

			include "views/modulos/sistema/".$ruta.".php";
		
		} else {

			if ($ruta == "resumenDiario"){

			include "views/modulos/".$ruta.".php";
		
		} else{
			include "views/modulos/error404.php";
		}
			
		}


	}
}

?>