<?php 

require_once "conexion.php";

Class ModeloFuncionarioo {

	static public function listarFuncionariooMdl($tabla) {
        $sql = Conexion::conectar()->prepare("SELECT
		*,
		CASE 
		WHEN conductor=0 THEN 'NO'                                        
		ELSE 'SI' END AS conductor
		 FROM $tabla");
		$sql -> execute();
		return $sql -> fetchAll();
	}

	static public function listarFuncionarioConductorMdl($tabla) {
        $sql = Conexion::conectar()->prepare("SELECT
		*,
		CASE 
		WHEN conductor=0 THEN 'NO'                                        
		ELSE 'SI' END AS conductor
		 FROM $tabla
		WHERE conductor=1
		");
		$sql -> execute();
		return $sql -> fetchAll();
	}


	



	
	static public function mdlCrearFuncionarioo($tabla, $datos,$rutaImagen) {
		//validacion registro existente
		$row_cnt=1;
		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rut = :rut");
		$sql->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
		$sql -> execute();		
        //cuenta la cantidad de registros encotrados con el mismo nombre
		if(count($sql -> fetchAll())>0){
			return "2";
		}else{

			$sql = Conexion::conectar()->prepare("INSERT INTO $tabla() VALUES (NULL, :rut, :nombre, :apellido, :grado, :estadoCivil, :imagen, :conductor, NOW())");
			$sql->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
			$sql->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$sql->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
			$sql->bindParam(":grado", $datos["grado"], PDO::PARAM_STR);
			$sql->bindParam(":estadoCivil", $datos["estadoCivil"], PDO::PARAM_STR);
			$sql->bindParam(":conductor", $datos["conductor"], PDO::PARAM_STR);
			$sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);
	
			if( $sql -> execute() ) {
				return "1";
			} else {
				return "error";
			}
		}
	}


	static public function mdlEliminarFuncionarioo($tabla, $id_Funcionarioo) {

		$sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_fucionario = :id");

		$sql->bindParam(":id", $id_Funcionarioo, PDO::PARAM_INT);

		if( $sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEditarFuncionarioo($tabla, $id_Funcionarioo) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$sql->bindParam(":id", $id_Funcionarioo, PDO::PARAM_INT);

		$sql -> execute();
		return $sql -> fetch();

	}
     
	static public function mdlActualizarFuncionarioo($tabla, $datos, $rutaImagen) {

		if( is_null($rutaImagen)) {
		$sql = Conexion::conectar()->prepare("UPDATE $tabla SET serie = :serie, tipoarma = :tipoarma,observacion = :observacion, estado = :estado, id_arma = :marca, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
			$sql->bindParam(":tipoarma", $datos["tipoarma"], PDO::PARAM_STR);
			$sql->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
			$sql->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
			$sql->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_Funcionarioo"], PDO::PARAM_INT);

		} else {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET serie = :serie, observacion = :observacion, estado = :estado, tipoarma = :tipoarma, id_arma = :marca, rutaImg = :rutaNueva, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
			$sql->bindParam(":tipoarma", $datos["tipoarma"], PDO::PARAM_STR);
			$sql->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
			$sql->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
			$sql->bindParam(":rutaNueva", $rutaImagen, PDO::PARAM_STR);
			$sql->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_Funcionarioo"], PDO::PARAM_INT);



		} 

		if($sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

}


?>