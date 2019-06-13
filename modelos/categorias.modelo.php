<?php

require_once "conexion.php";

class ModeloCategorias{

    /*=============================================
	MOSTRAR Proyectos
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

    /*=============================================
	MOSTRAR ULTIMO PROYECTO
	=============================================*/

	static public function mdlMostrarUltimaCategoria($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT 1 ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT 1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
    
    /*=============================================
	CREAR PROYECTO
	=============================================*/

	static public function mdlIngresarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria, clientep, lugar, fechaI, fechaF, trabR, marcaL, descripM, cantL, tipoV, consider, obvser) VALUES (:categoria, :clientep, :lugar, :fechaI, :fechaF, :trabR, :marcaL, :descripM, :cantL, :tipoV, :consider, :obvser)");

		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":clientep", $datos["clientep"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaI", $datos["fechaI"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaF", $datos["fechaF"], PDO::PARAM_STR);
		$stmt->bindParam(":trabR", $datos["trabR"], PDO::PARAM_STR);
		$stmt->bindParam(":marcaL", $datos["marcaL"], PDO::PARAM_STR);
		$stmt->bindParam(":descripM", $datos["descripM"], PDO::PARAM_STR);
		$stmt->bindParam(":cantL", $datos["cantL"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoV", $datos["tipoV"], PDO::PARAM_STR);
		$stmt->bindParam(":consider", $datos["consider"], PDO::PARAM_STR);
		$stmt->bindParam(":obvser", $datos["obvser"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }
    
    /*=============================================
	EDITAR PROYECTO
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria, clientep = :clientep, lugar = :lugar, fechaI = :fechaI, fechaF = :fechaF, trabR = :trabR, marcaL = :marcaL, descripM = :descripM, cantL = :cantL, tipoV = :tipoV, consider = :consider, obvser = :obvser WHERE id = :id");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":clientep", $datos["clientep"], PDO::PARAM_STR);
		$stmt -> bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaI", $datos["fechaI"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaF", $datos["fechaF"], PDO::PARAM_STR);
		$stmt -> bindParam(":trabR", $datos["trabR"], PDO::PARAM_STR);
		$stmt -> bindParam(":marcaL", $datos["marcaL"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripM", $datos["descripM"], PDO::PARAM_STR);
		$stmt -> bindParam(":cantL", $datos["cantL"], PDO::PARAM_STR);
		$stmt -> bindParam(":tipoV", $datos["tipoV"], PDO::PARAM_STR);
		$stmt -> bindParam(":consider", $datos["consider"], PDO::PARAM_STR);
		$stmt -> bindParam(":obvser", $datos["obvser"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }
    
    /*=============================================
	BORRAR PROYECTO
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		// DELETE a1, a2 FROM categorias AS a1 INNER JOIN productos AS a2 WHERE a1.Id=a2.id_categoria

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}