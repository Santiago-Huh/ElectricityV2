/*=============================================
EDITAR Proyecto
=============================================*/
$(".tablas").on("click", ".btnEditarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

      url:"ajax/categorias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
        $("#editarCategoria").val(respuesta["categoria"]);
        $("#editarCliente").val(respuesta["clientep"]);
        $("#editarLugar").val(respuesta["lugar"]);
        $("#editarFI").val(respuesta["fechaI"]);
        $("#editarFF").val(respuesta["fechaF"]);
        $("#editarTR").val(respuesta["trabR"]);
        $("#editarLumi").val(respuesta["marcaL"]);
        $("#editarM").val(respuesta["descripM"]);
        $("#editarCL").val(respuesta["cantL"]);
        $("#editarTV").val(respuesta["tipoV"]);
        $("#editarCon").val(respuesta["consider"]);
        $("#editarOB").val(respuesta["obvser"]);
        $("#idCategoria").val(respuesta["id"]);
	  }

  	})

})

/*=============================================
EXTRAER PROYECTO ID & NOMBRE PROYECTO
=============================================*/
$(".tablas").on("click", ".btnAgregarRegistro", function(){

	var idProyecto = $(this).attr("idProyecto");

	var datos = new FormData();
    datos.append("idProyecto", idProyecto);

    $.ajax({

      url:"ajax/categorias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        $("#idProyecto").val(respuesta["id"]);
        $("#nomPro").val(respuesta["categoria"]);
	  }

  	})

})

/*=============================================
ELIMINAR PROYECTO
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");
	
	swal({
        title: '¿Está seguro de querer eliminar? Esta acción eliminara todo los datos y componentes vinculados a este proyecto',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar proyecto!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=proyectos&idCategoria="+idCategoria;
        }

  })

})