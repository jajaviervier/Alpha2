<?php 


Class ControllerSesion {

	public function iniciarSesionCtr() {
		$_SESSION["tipo"]="";
		if (isset($_POST["user"])) {
			$tabla = "usuarios";
			$usuario = $_POST["user"];
			
			$respuesta = ModeloSesion::iniciarSesionMdl($tabla, $usuario);
			
			if($respuesta["usuariosCorreo"] == $_POST["user"] && $respuesta["usuariosPass"] == $_POST["password"]) {

				$_SESSION["autenticar"] = "ok";
				$_SESSION["nombre"] = $respuesta["usuariosNombre"];
				$_SESSION["id"] = $respuesta["idusuarios"];
				$_SESSION["avatar"] = $respuesta["usuariosAvatar"];
				$_SESSION["tipo"] = $respuesta["tipo"];


				//Si es de tipo administrador permite ingresar, en caso contrario lo rechaza
				if($_SESSION["tipo"]=="Administrador"){
					echo '<script>window.location = "home"</script>';
				}else{
					echo '<div class="alert alert-danger">Solo Funcionarios del tipo Administrador pueden Acceder.</div>';
				}
				

			} else {
				echo '<div class="alert alert-danger">Datos incorrectos. Inténtelo nuevamente.</div>';
			}
		}
	}
}

?>