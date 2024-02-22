var columnasrepetidas = [];
var cantidadFilas = 0;
var registrosErroneos = 0;
var registrosExitosos = 0;
var dataPostulante;
$(document).ready(function () {
	cargaElementos();
	$("#form-editar-postulante").submit(function () {
		setPostulante();
		event.preventDefault();
	});
});

function cargaElementos() {
	getPostulante();
}

function getPostulante() {

	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-editar-postulante .alerta").css({
				'display': 'none'
			});
		},
		complete: function () {
			$("#loader").css({
				'display': 'none'
			});
		},
		error: function (jqXHR, textStatus, errorThrown) {
			// code en caso de error de la ejecucion del ajax
			console.log(textStatus + errorThrown);
			$("#form-editar-postulante .alerta").text("Hubo un problema al actualizar los datos");
			$("#form-editar-postulante .alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			console.log(result);
			$("nombre_postulante").text(result[0].nombre+" "+result[0].apellido_paterno+" "+result[0].apellido_materno);
			
			$("#form-editar-postulante input[name=rut]").val(result[0].rut);
			$("#form-editar-postulante input[name=dv]").val(result[0].dv);
			$("#form-editar-postulante input[name=nombre]").val(result[0].nombre);
			$("#form-editar-postulante input[name=apellido_paterno]").val(result[0].apellido_paterno);
			$("#form-editar-postulante input[name=apellido_materno]").val(result[0].apellido_materno);
			$("#form-editar-postulante input[name=fecha_nacimiento]").val(result[0].fecha_nacimiento);
			$("#sexo").val(result[0].sexo);
			$("#form-editar-postulante input[name=correo_electronico]").val(result[0].correo_electronico);
			$("#form-editar-postulante input[name=telefono_celular]").val(result[0].telefono_celular);
			$("#form-editar-postulante input[name=direccion]").val(result[0].direccion);
			$("#form-editar-postulante input[name=comuna]").val(result[0].comuna);
			$("#form-editar-postulante input[name=region]").val(result[0].region);
			$("#laboral").val(result[0].laboral);
		},
		url: "Postulante/getPostulante"
	});
}


function setPostulante() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#form-editar-postulante").serialize(),
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-editar-postulante .alerta").css({
				'display': 'none'
			});
		},
		complete: function () {
			$("#loader").css({
				'display': 'none'
			});
		},
		error: function (jqXHR, textStatus, errorThrown) {
			// code en caso de error de la ejecucion del ajax
			console.log(textStatus + errorThrown);
			$("#form-editar-postulante .alerta").text("Hubo un problema al actualizar los datos: " + errorThrown);
			$("#form-editar-postulante .alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			$("#form-editar-postulante .alerta").text('Registro Actualizado');
			$("#form-editar-postulante .alerta").css({
				'display': 'block'
			});
		},
		url: "Postulante/setPostulante"
	});
}
