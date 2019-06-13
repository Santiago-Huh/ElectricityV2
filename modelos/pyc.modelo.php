<?php

require_once "conexion.php";

class ModeloPYC{
	
	/*=============================================
	MOSTRAR PROYECTOS
	=============================================*/

	static public function pnMostrarPYC($tabla, $item, $valor){
		if ($item != null) {

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
	CREAR PYC
	=============================================*/

	static public function mdlIngresarPYC($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idCate, nomp, lugar, comV, comOP, sysC, sysS, weeks, aliPD, costoH, costoP, cashET, cashE, costoT, costoS, costoD, observacion) VALUES (:idCate, :nomp, :lugar, :comV, :comOP, :sysC, :sysS, :weeks, :aliPD, :costoH, :costoP, :cashET, :cashE, :costoT, :costoS, :costoD, :observacion)");

		$stmt->bindParam(":idCate", $datos["idCate"], PDO::PARAM_STR);
		$stmt->bindParam(":nomp", $datos["nomp"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":comV", $datos["comV"], PDO::PARAM_STR);
		$stmt->bindParam(":comOP", $datos["comOP"], PDO::PARAM_STR);
		//$stmt->bindParam(":comO", $datos["comO"], PDO::PARAM_STR);
		//$stmt->bindParam(":sysI", $datos["sysI"], PDO::PARAM_STR);
		$stmt->bindParam(":sysC", $datos["sysC"], PDO::PARAM_STR);
		$stmt->bindParam(":sysS", $datos["sysS"], PDO::PARAM_STR);
		$stmt->bindParam(":weeks", $datos["weeks"], PDO::PARAM_STR);
		$stmt->bindParam(":aliPD", $datos["aliPD"], PDO::PARAM_STR);
		$stmt->bindParam(":costoH", $datos["costoH"], PDO::PARAM_STR);
		$stmt->bindParam(":costoP", $datos["costoP"], PDO::PARAM_STR);
		$stmt->bindParam(":cashET", $datos["cashET"], PDO::PARAM_STR);
		$stmt->bindParam(":cashE", $datos["cashE"], PDO::PARAM_STR);
		$stmt->bindParam(":costoT", $datos["costoT"], PDO::PARAM_STR);
		$stmt->bindParam(":costoS", $datos["costoS"], PDO::PARAM_STR);
		$stmt->bindParam(":costoD", $datos["costoD"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR PYC
	=============================================*/

	static public function mdlEditarPYC($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idCate = :idCate, nomp = :nomp, lugar = :lugar, comV = :comV, comOP = :comOP,  sysC = :sysC, sysS = :sysS, weeks = :weeks, aliPD = :aliPD, costoH = :costoH, costoP = :costoP, cashET = :cashET, cashE = :cashE, costoT = :costoT, costoS = :costoS, costoD = :costoD, observacion = :observacion WHERE idP = :idP");

		/**
		//$stmt->bindParam(":comO", $datos["comO"], PDO::PARAM_STR);
		//$stmt->bindParam(":sysI", $datos["sysI"], PDO::PARAM_STR);
		*/

		$stmt->bindParam(":nomp", $datos["nomp"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":comV", $datos["comV"], PDO::PARAM_STR);
		$stmt->bindParam(":comOP", $datos["comOP"], PDO::PARAM_STR);
		$stmt->bindParam(":sysC", $datos["sysC"], PDO::PARAM_STR);
		$stmt->bindParam(":sysS", $datos["sysS"], PDO::PARAM_STR);
		$stmt->bindParam(":weeks", $datos["weeks"], PDO::PARAM_STR);
		$stmt->bindParam(":aliPD", $datos["aliPD"], PDO::PARAM_STR);
		$stmt->bindParam(":costoH", $datos["costoH"], PDO::PARAM_STR);
		$stmt->bindParam(":costoP", $datos["costoP"], PDO::PARAM_STR);
		$stmt->bindParam(":cashET", $datos["cashET"], PDO::PARAM_STR);
		$stmt->bindParam(":cashE", $datos["cashE"], PDO::PARAM_STR);
		$stmt->bindParam(":costoT", $datos["costoT"], PDO::PARAM_STR);
		$stmt->bindParam(":costoS", $datos["costoS"], PDO::PARAM_STR);
		$stmt->bindParam(":costoD", $datos["costoD"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":idCate", $datos["idCate"], PDO::PARAM_INT);
		$stmt -> bindParam(":idP", $datos["idP"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
}