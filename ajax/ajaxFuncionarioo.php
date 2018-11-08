<?php 

require_once "../controllers/funcionarioo.controller.php";
require_once "../models/funcionarioo.modelo.php";

Class ajaxFuncionarioo {

	public $id_Funcionarioo;
	public $rut_Funcionarioo;
	public $nombre_Funcionarioo;
	public $apellido_Funcionarioo;
	public $imagen_Funcionarioo;
    public $estadoCivil_Funcionarioo;
	public $grado_Funcionario;
	public $conductor;
	public $llave_subcat;
    public $idArmasForanea;
	public function crearFuncionarioo(){
		$datos = array("rut"=>$this->rut_Funcionarioo,
						"nombre"=>$this->nombre_Funcionarioo,
						"apellido"=>$this->apellido_Funcionarioo,
						"imagen"=>$this->imagen_Funcionarioo,
						"grado"=>$this->grado_Funcionario,
						"conductor"=>$this->conductor,
                        "estadoCivil"=>$this->estadoCivil_Funcionarioo);
		$respuesta = ControllerFuncionarioo::ctrCrearFuncionarioo($datos);
		echo $respuesta;
	}

	public function cargarSubcategorias(){
		$respuesta = ControllerProductos::ctrCargarSubcat($this->llave_subcat);
		echo $respuesta;
	}
	public function editarFuncionarioo(){
		$id_Funcionarioo = $this->id_Funcionarioo;
		$respuesta = ControllerFuncionarioo::ctrEditarFuncionarioo($id_Funcionarioo);
		$datos = array("id_Funcionarioo"=>$respuesta["id"],
						"serieFuncionarioo"=>$respuesta["serie"],
						"tipoFuncionarioo"=>$respuesta["tipoarma"],
						"observacion"=>$respuesta["observacion"],
						"estado"=>$respuesta["estado"],
						"idArmasForanea"=>$respuesta["id_arma"],
						"imagen"=>substr($respuesta["rutaImg"], 3)
						);
						echo json_encode($datos);
	}
	public function actualizarFuncionarioo(){
		$datos = array( "id_Funcionarioo"=>$this->id_Funcionarioo,
						"serie"=>$this->serie_Funcionarioo,
						"tipoarma"=>$this->tipoarma_Funcionarioo,
						"observacion"=>$this->observacion_Funcionarioo,
						"estado"=>$this->estado_Funcionarioo,
						"marca"=>$this->idArmasForanea,
						"imagen"=>$this->imagen_Funcionarioo,
						"rutaActual"=>$this->rutaActual
						);
		$respuesta = ControllerFuncionarioo::ctrActualizarFuncionarioo($datos);
		echo $respuesta;
	}
	public function eliminarFuncionarioo(){
		$id_Funcionarioo = $this->id_Funcionarioo;
		$ruta = $this->imagen_Funcionarioo;

		$respuesta = ControllerFuncionarioo::ctrEliminarFuncionarioo($id_Funcionarioo, $ruta);

		echo $respuesta;

	}

}

$tipoOperacion = $_POST["tipoOperacion"];

if($tipoOperacion == "insertarFuncionarioo") {
	$crearNuevoFuncionarioo = new ajaxFuncionarioo();
	$crearNuevoFuncionarioo -> rut_Funcionarioo = $_POST["rutFuncionarioo"];
	$crearNuevoFuncionarioo -> nombre_Funcionarioo = $_POST["nombreFuncionarioo"];
	$crearNuevoFuncionarioo -> apellido_Funcionarioo = $_POST["apellidoFuncionarioo"];
	$crearNuevoFuncionarioo -> grado_Funcionario = $_POST["gradoFuncionarioo"];
	$crearNuevoFuncionarioo -> conductor = $_POST["conductor"];
    $crearNuevoFuncionarioo -> imagen_Funcionarioo = $_FILES["imagenFuncionarioo"];
    $crearNuevoFuncionarioo -> estadoCivil_Funcionarioo = $_POST["estado_CivilFuncionarioo"];
	$crearNuevoFuncionarioo ->crearFuncionarioo();
}
if($tipoOperacion == "seleccionarSubcategorias") {
	$selectSub = new ajaxProductos();
	$selectSub -> llave_subcat = $_POST["llave"];
	$selectSub ->cargarSubcategorias();
}
if ($tipoOperacion == "editarFuncionarioo") {
	$editarFuncionarioo = new ajaxFuncionarioo();
	$editarFuncionarioo -> id_Funcionarioo = $_POST["id_Funcionarioo"];
	$editarFuncionarioo -> editarFuncionarioo();
}
if ($tipoOperacion == "actualizarFuncionarioo") {
	$actualizarFuncionarioo = new ajaxFuncionarioo();
	$actualizarFuncionarioo -> id_Funcionarioo = $_POST["id_Funcionarioo"];
	$actualizarFuncionarioo -> serie_Funcionarioo = $_POST["serieFuncionarioo"];
	$actualizarFuncionarioo -> tipoarma_Funcionarioo = $_POST["tipoFuncionarioo"];
	$actualizarFuncionarioo -> idArmasForanea = $_POST["idArmasForanea"];
	$actualizarFuncionarioo -> estado_Funcionarioo = $_POST["estado"];
	$actualizarFuncionarioo -> observacion_Funcionarioo = $_POST["observacionitemArma"];
	$actualizarFuncionarioo -> imagen_Funcionarioo = $_FILES["imagenFuncionarioo"];
	$actualizarFuncionarioo -> rutaActual = $_POST["rutaActual"];
	$actualizarFuncionarioo -> actualizarFuncionarioo();
}
if ($tipoOperacion == "eliminarFuncionarioo") {
	$eliminarFuncionarioo = new ajaxFuncionarioo();
	$eliminarFuncionarioo -> id_Funcionarioo = $_POST["id_Funcionarioo"];
	$eliminarFuncionarioo -> imagen_Funcionarioo = $_POST["rutaImagen"];
	$eliminarFuncionarioo -> eliminarFuncionarioo();
}

?>