/*=============================================
EDITAR CENSO
=============================================*/
$(".tablas").on("click", ".btnEditarCenso", function(){

	var idCenso = $(this).attr("idCenso");

	var datos = new FormData();
	datos.append("idCenso", idCenso);

	$.ajax({
		url: "ajax/censos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success: function(respuesta){

			$("#editarLumi").val(respuesta["lumi"]);
			$("#editarLuminId").val(respuesta["luminId"]);
			$("#editarRpu").val(respuesta["rpu"]);
			$("#editarCol").val(respuesta["col"]);
			$("#editarCalle").val(respuesta["calle"]);
			$("#editarAlp").val(respuesta["alP"]);
			$("#editarTipoVi").val(respuesta["tipoVi"]);
			$("#editarUbip").val(respuesta["ubiP"]);
			$("#editarDisIn").val(respuesta["disIn"]);
			$("#editarCarriles").val(respuesta["carriles"]);
			$("#editarCo").val(respuesta["co"]);
			$("#editarEstaC").val(respuesta["estaC"]);
			$("#editarAlimen").val(respuesta["alimen"]);
			$("#editarLumiAR").val(respuesta["lumiAR"]);
			$("#editarLatitud").val(respuesta["latitud"]);
			$("#editarLongitud").val(respuesta["longitud"]);
			$("#editarInstalador").val(respuesta["instalador"]);
			$("#editarTipoP").val(respuesta["tipoP"]);
			$("#editarLumiE").val(respuesta["modeloLE"]);
			$("#editarPotencia").val(respuesta["potenciaLE"]);
			$("#idCenso").val(respuesta["idC"]);

		}
	})

})

/*=============================================
ELIMINAR CENSO
=============================================*/
$(".tablas").on("click", ".btnEliminarCenso", function(){

	 var idCenso = $(this).attr("idCenso");

	 swal({
	 	title: '¿Está seguro de borrar el proyecto?',
	 	text: "¡Si no lo está, puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar proyecto'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=administrar-censos&idCenso="+idCenso;

	 	}

	 })

})