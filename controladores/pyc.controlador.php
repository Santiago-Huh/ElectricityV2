<?php

 

class ControladorPYC{
	
	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarPYC($item, $valor){

		$tabla = "proyectos";

		$respuesta = ModeloPYC::pnMostrarPYC($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	CREAR PYC
	=============================================*/

	static public function ctrCrearPYC(){

		if(isset($_POST["nom"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nom"])){

				$tabla = "proyectos";

				//$datos = $_POST["nuevaCategoria"];

				$datos = array("nomp" => $_POST["nom"],
								"idCate" => $_POST["idCatego"],
								"lugar" => $_POST["lug"],
								"comV" => $_POST["res1"],
								"comOP" => $_POST["res2"],
								"sysC" => $_POST["res5"],
								"sysS" => $_POST["res6"],
								"weeks" => $_POST["res7"],
								"aliPD" => $_POST["res12"],
								"costoH" => $_POST["res9"],
								"costoP" => $_POST["res10"],
								"cashET" => $_POST["res13"],
								"cashE" => $_POST["res11"],
								"costoT" => $_POST["totalFF"],
								"costoS" => $_POST["totalS"],
								"costoD" => $_POST["totalD"],
								"observacion" => $_POST["obse"]);

				$respuesta = ModeloPYC::mdlIngresarPYC($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Información guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "administrar-pyc";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La PYC no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "pyc";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	EDITAR PYC
	=============================================*/

	static public function ctrEditarPYC(){

		if(isset($_POST["editarProyecto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]|[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarProyecto"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]|[a-zA-Z0-9\,]+$/', $_POST["editarLugar"])&&
				preg_match('/^[0-9]+$/', $_POST["editarRes1"])&&
				preg_match('/^[0-9]+$/', $_POST["editarRes2"])&&
				preg_match('/^[0-9]|[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarRes5"])&&
				preg_match('/^[0-9]+$/', $_POST["editarRes6"])&&
				preg_match('/^[0-9]+$/', $_POST["editarRes7"])&&
				preg_match('/^[0-9]+$/', $_POST["editarRes12"])&&
				preg_match('/^[0-9]+$/', $_POST["editarRes9"])&&
				preg_match('/^[0-9]+$/', $_POST["editarRes10"])&&
				preg_match('/^[0-9]+$/', $_POST["editarRes13"])&&
				preg_match('/^[0-9]+$/', $_POST["editarRes11"])&&
				preg_match('/^[0-9]|[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarTotalFF"])&&
				preg_match('/^[0-9]|[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarTotalS"])&&
				preg_match('/^[0-9]|[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarTotalD"])&&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]|[a-zA-Z0-9\,]|[a-zA-Z, ]*$/', $_POST["obser1"])){

				$tabla = "proyectos";

				$datos = array("nomp"=>$_POST["editarProyecto"],
								"lugar"=>$_POST["editarLugar"],
								"comV"=>$_POST["editarRes1"],
								"comOP"=>$_POST["editarRes2"],
								"sysC"=>$_POST["editarRes5"],
								"sysS"=>$_POST["editarRes6"],
								"weeks"=>$_POST["editarRes7"],
								"aliPD"=>$_POST["editarRes12"],
								"costoH"=>$_POST["editarRes9"],
								"costoP"=>$_POST["editarRes10"],
								"cashET"=>$_POST["editarRes13"],
								"cashE"=>$_POST["editarRes11"],
								"costoT"=>$_POST["editarTotalFF"],
								"costoS"=>$_POST["editarTotalS"],
								"costoD"=>$_POST["editarTotalD"],
								"observacion"=>$_POST["obser1"],
								"idCate"=>$_POST["idCatego"],
							   "idP"=>$_POST["idPyc"]);

				$respuesta = ModeloPYC::mdlEditarPYC($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El PYC ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "administrar-pyc";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El PYC no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "administrar-pyc";

							}
						})

			  	</script>';

			}

		}

    }
}