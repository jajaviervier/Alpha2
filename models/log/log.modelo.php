<?php 

require_once "conexion.php";

Class LOG {

	static public function obtenerTodo($tabla, $usuario) {
		$sql = Conexion::conectar()->prepare("SELECT * FROM registro");
		$sql -> execute();
		return $sql->fetch();
	}

}

?>