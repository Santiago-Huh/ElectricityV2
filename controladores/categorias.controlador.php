<?php

class ControladorCategorias{

    /*=============================================
	MOSTRAR Proyectos
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

    }

    /*=============================================
	MOSTRAR ULTIMO Proyecto
	=============================================*/

	static public function ctrMostrarUltimaCategoria($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarUltimaCategoria($tabla, $item, $valor);

		return $respuesta;
	
	}
    
    /*=============================================
	CREAR PROYECTOS
	=============================================*/

	static public function ctrCrearCategoria(){

		if(isset($_POST["nuevaCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

				$tabla = "categorias";

				//$datos = $_POST["nuevaCategoria"];

				$datos = array("categoria" => $_POST["nuevaCategoria"],
								"clientep" => $_POST["nuevoUsuario"],
								"lugar" => $_POST["nuevoLugar"],
								"fechaI" => $_POST["nuevoFI"],
								"fechaF" => $_POST["nuevoFF"],
								"trabR" => $_POST["TrabajosaRealizar"],
								"marcaL" => $_POST["nuevaLuminaria"],
								"descripM" => $_POST["nuevoMaterial"],
								"cantL" => $_POST["nuevaCantidad"],
								"tipoV" => $_POST["TipoVialidad"],
								"consider" => $_POST["Consideraciones"],
								"obvser" => $_POST["Observaciones"]);

				$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El proyecto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "factibilidad";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proyectos";

							}
						})

			  	</script>';

			}

		}

    }
    
    /*=============================================
	EDITAR PROYECTO
	=============================================*/

	static public function ctrEditarCategoria(){

		if(isset($_POST["editarCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"]) &&
				preg_match('/^[#\.\-a-zA-Z0-9 ]|[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"])&&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarLugar"])&&
				preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarFI"])&&
				preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarFF"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTR"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarLumi"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarM"]) &&
				preg_match('/^[0-9]+$/', $_POST["editarCL"]) &&
				preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarTV"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]|[a-zA-Z0-9]|[a-zA-Z0-9\,]|[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarCon"]) &&
				preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarOB"])){


				$tabla = "categorias";

				$datos = array("categoria"=>$_POST["editarCategoria"],
								"clientep"=>$_POST["editarCliente"],
								"lugar"=>$_POST["editarLugar"],
								"fechaI"=>$_POST["editarFI"],
								"fechaF"=>$_POST["editarFF"],
								"trabR"=>$_POST["editarTR"],
								"marcaL"=>$_POST["editarLumi"],
								"descripM"=>$_POST["editarM"],
								"cantL"=>$_POST["editarCL"],
								"tipoV"=>$_POST["editarTV"],
								"consider"=>$_POST["editarCon"],
								"obvser"=>$_POST["editarOB"],
							   "id"=>$_POST["idCategoria"]);

				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El proyecto ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "proyectos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proyectos";

							}
						})

			  	</script>';

			}

		}

    }
    
    /*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarCategoria(){

		if(isset($_GET["idCategoria"])){

			$tabla ="Categorias";
			$datos = $_GET["idCategoria"];

			$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El proyecto ha sido eliminado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "proyectos";

									}
								})

					</script>';
			}
		}
		
	}

}