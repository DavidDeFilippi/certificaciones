var columnasrepetidas = [];
var cantidadFilas = 0;
var registrosErroneos = 0;
var registrosExitosos = 0;
var dataPostulante;
$(document).ready(function () {
	cargaElementos();
	$('#sidebar ul li a span:contains("Sedes")').parent().parent().addClass('active');
	$("#form-sede").submit(function () {
		updateSede();
		event.preventDefault();
	});
	$("#form-agregar-examen").submit(function () {
		setExamen();
		event.preventDefault();
	});
	$("#form-agregar-examen-cbx").submit(function () {
		setExamenfromCBX();
		event.preventDefault();
	});
	$("#form-agregar-postulante").submit(function () {
		setPostulante();
		event.preventDefault();
	});
	$("#form-agregar-sala").submit(function () {
		setSala();
		event.preventDefault();
	});
	$("#form-simular-horarios").submit(function () {
		simularHorarios();
		event.preventDefault();
	});
	$("#frm-confirma-pago").submit(function () {
		swal({
			title: 'Atención',
			text: "¿Esta completamente seguro(a)?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#138C45',
			cancelButtonColor: '#EE2039',
			confirmButtonText: 'Absolutamente',
			cancelButtonText: 'No'
		}).then((result) => {
			if (result.value) {

				aprobarRechazarTransferenciaBancaria();
			}
		});
		event.preventDefault();
	});
	$("#frm-carga-masiva").submit(function () {
		swal({
			title: 'Atención',
			text: "¿Esta completamente seguro(a)?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#138C45',
			cancelButtonColor: '#EE2039',
			confirmButtonText: 'Absolutamente',
			cancelButtonText: 'No'
		}).then((result) => {
			if (result.value) {
				if ($("#htmlout").html() == '') {
					swal({
						title: 'Error',
						text: "No hay ningún archivo cargado.",
						type: 'error',
						showCancelButton: false,
						confirmButtonColor: '#138C45',
						confirmButtonText: 'Aceptar',
						allowOutsideClick: false
					});
				} else {
					cargaMasiva();
				}
			}
		});
		event.preventDefault();
	});
	$("#pestanas li").click(function () {
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		$('.tab-content div').siblings().removeClass('in').removeClass('active');
		$($(this).find('a').attr('href')).addClass('in').addClass('active');
	});
	$('#salas_cbx_reservas').change(function () {
			$('#out-reservas').html('');
			$('#fechas_cbx_reservas').prop('disabled', true);
			$('#fechas_cbx_reservas').html('');
			$('#bloques_cbx_reservas').prop('disabled', true);
			$('#bloques_cbx_reservas').html('');
			getFechasSalaCBX($(this).val());
	});
	$('#fechas_cbx_reservas').change(function () {
			$('#out-reservas').html('');
			$('#bloques_cbx_reservas').prop('disabled', true);
			$('#bloques_cbx_reservas').html('');
			getBloquesFechaBySala($(this).val());
	});
	$('#bloques_cbx_reservas').change(function () {
			$('#out-reservas').html('');
			getCuposbyIdBloque($(this).val());
	});
});

function setExamen() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#form-agregar-examen").serialize(),
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-agregar-examen .alerta").css({
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
			$("#form-agregar-examen .alerta").text("Hubo un problema al actualizar los datos: " + errorThrown);
			$("#form-agregar-examen .alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			if (result[0].respuesta == 1) {
				$("#form-agregar-examen .alerta").removeClass('alert-danger').addClass('alert-success');
				$("#form-agregar-examen .alerta").text(result[0].mensaje);
				$("#form-agregar-examen .alerta").css({
					'display': 'block'
				});
				cargaElementos();
				$("#form-agregar-examen")[0].reset();
			} else {
				$("#form-agregar-examen .alerta").text(result[0].mensaje);
				$("#form-agregar-examen .alerta").css({
					'display': 'block'
				});
			}
		},
		url: "Panel_Sede/setExamen"
	});
}

function setExamenfromCBX() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#form-agregar-examen-cbx").serialize(),
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-agregar-examen-cbx .alerta").css({
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
			$("#form-agregar-examen-cbx .alerta").text("Hubo un problema al actualizar los datos: " + errorThrown);
			$("#form-agregar-examen-cbx .alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			if (result[0].respuesta == 1) {
				$("#form-agregar-examen-cbx .alerta").removeClass('alert-danger').addClass('alert-success');
				$("#form-agregar-examen-cbx .alerta").text(result[0].mensaje);
				$("#form-agregar-examen-cbx .alerta").css({
					'display': 'block'
				});
				cargaElementos();
				$("#form-agregar-examen-cbx")[0].reset();
			} else {
				$("#form-agregar-examen-cbx .alerta").text(result[0].mensaje);
				$("#form-agregar-examen-cbx .alerta").css({
					'display': 'block'
				});
			}
		},
		url: "Panel_Sede/setExamenfromCBX"
	});
}

function cargaElementos() {
	getSede();
	getPostulantes();
	getExamenes();
	getExamenesCBXBySede();
	getSalasCBXBySede();
	getExamenesCBXALL();
	getSalas();
	getSalasCuposTotales();
}

function getSede() {

	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-sede .alerta").css({
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
			$("#form-sede .alerta").text("Hubo un problema al actualizar los datos");
			$("#form-sede .alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			$("nombre_sede").text(result[0].nombre_sede);
			$("#form-sede input[name=id_sede]").val(result[0].id_sede);
			$("#form-sede input[name=nombre_sede]").val(result[0].nombre_sede);
			$("#form-sede input[name=direccion_sede]").val(result[0].direccion_sede);
			$("#form-sede input[name=fono_sede]").val(result[0].fono_sede);
		},
		url: "Panel_Sede/getSede"
	});

}

function updateSede() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#form-sede").serialize(),
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-sede .alerta").css({
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
			$("#form-sede .alerta").text("Hubo un problema al actualizar los datos");
			$("#form-sede .alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			if (result[0].respuesta == 1) {
				cargaElementos();
				$("#form-sede .alerta").removeClass('alert-danger').addClass('alert-success');
				$("#form-sede .alerta").text(result[0].mensaje);
				$("#form-sede .alerta").css({
					'display': 'block'
				});
			} else {
				$("#form-sede .alerta").text(result[0].mensaje);
				$("#form-sede .alerta").css({
					'display': 'block'
				});
			}
		},
		url: "Panel_Sede/updateSede"
	});
}

function getFechasSalaCBX(id_sala) {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data:{id_sala:id_sala},
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			if (result.length > 0) {
				var html = "";
				html += '<option value="">Seleccione</option>';
				$.each(result, function (i, item) {
					html += '<option value="' + item.fecha_inicio + '">' + item.fecha_inicio_formateado + '</option>';
				});
				$("#fechas_cbx_reservas").html(html);
			} else {
				$("#fechas_cbx_reservas").html('<option value="">No hay fechas</option>');
			}
			$('#fechas_cbx_reservas').prop('disabled', false);


		},
		url: "Panel_Sede/getFechasSalaCBX"
	});
}
function getBloquesFechaBySala(fecha) {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data:{fecha:fecha},
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			if (result.length > 0) {
				var html = "";
				html += '<option value="">Seleccione</option>';
				$.each(result, function (i, item) {
					html += '<option value="' + item.id_bloque + '">' + item.hora_inicio + '</option>';
				});
				$("#bloques_cbx_reservas").html(html);
			} else {
				$("#bloques_cbx_reservas").html('<option value="">No hay fechas</option>');
			}
			$('#bloques_cbx_reservas').prop('disabled', false);


		},
		url: "Panel_Sede/getBloquesFechaBySala"
	});
}
function getCuposbyIdBloque(id_bloque) {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data:{id_bloque:id_bloque},
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			console.log(result);
			var html = "";
			$("#out-reservas").html("");
			html += '<table id="tbl_resultado_simulacion" class="table table-bordered table-striped">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID';
			html += '</th>';
			html += '<th>RUT';
			html += '</th>';
			html += '<th>Nombre';
			html += '</th>';
			html += '<th>Examen';
			html += '</th>';
			html += '</th>';
			html += '<th>Fecha en que se tomó la reserva';
			html += '</th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(result, function (i, item) {
				html += '<tr rid="' + i + '">';
				html += '<td>';
				html += item.id_cupo;
				html += '</td>';
				html += '<td>';
				html += item.rut_postulante;
				html += '</td>';
				html += '<td>';
				html += item.nombre_postulante;
				html += '</td>';
				html += '<td>';
				html += item.nombre_certificacion;
				html += '</td>';
				html += '<td>';
				html += item.fecha_actualizacion;
				html += '</td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '</table> <br><br>';
			$("#out-reservas").html(html);
		},
		url: "Panel_Sede/getCuposbyIdBloque"
	});
}

function getExamenesCBXBySede() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			if (result.length > 0) {
				var html = "";
				html += '<option value="">Seleccione</option>';
				$.each(result, function (i, item) {
					html += '<option value="' + item.id_certificacion + '">' + item.nombre_certificacion + '</option>';
				});
				$("#id_examen_carga_masiva").html(html);
				$("#id_examen_nuevo_postulante").html(html);
			} else {
				$("#id_examen_carga_masiva").html('<option value="">No hay exámenes</option>');
				$("#id_examen_nuevo_postulante").html('<option value="">No hay exámenes</option>');
			}

		},
		url: "Panel_Sede/getExamenesCBXBySede"
	});
}

function getSalasCBXBySede() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			if (result.length > 0) {
				var html = "";
				html += '<option value="">Seleccione</option>';
				$.each(result, function (i, item) {
					html += '<option value="' + item.id_sala + '">' + item.nombre_sala + '</option>';
				});
				$("#salas_cbx").html(html);
				$("#salas_cbx_reservas").html(html);
			} else {
				$("#salas_cbx").html('<option value="">No hay salas</option>');
				$("#salas_cbx_reservas").html('<option value="">No hay salas</option>');
			}

		},
		url: "Panel_Sede/getSalasCBXBySede"
	});
}

function getSalasCuposTotales() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			console.log(result);
			var html = '';
			$("#tbl_salas_reservas tbody").html(html);
			if (result.length > 0) {
				$.each(result, function (i, item) {
					html += '<tr>';
					html += '<td>';
					html += item.nombre_sala;
					html += '</td>';
					html += '<td>';
					html += item.cupos_totales;
					html += '</td>';
					html += '<td>';
					html += item.cupos_reservados;
					html += '</td>';
					html += '<td>';
					html += item.cupos_disponibles;
					html += '</td>';
					html += '</tr>';
				});
			} else {
				html += '<tr><td colspan="6" style="text-align:center;">No existen registros.</td><tr>';
			}
			$("#tbl_salas_reservas tbody").html(html);

		},
		url: "Panel_Sede/getSalasCuposTotales"
	});
}

function getExamenes() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			var html = '';
			$("#tbl_certificaciones tbody").html(html);
			if (result.length > 0) {
				$.each(result, function (i, item) {
					html += '<tr>';
					html += '<td>';
					html += item.nombre_certificacion;
					html += '</td>';
					html += '<td>';
					html += item.valor_formateado;
					html += '</td>';
					html += '<td>';
					html += item.fecha_inicio;
					html += '</td>';
					html += '<td>';
					html += item.fecha_termino;
					html += '</td>';

					var color = item.cantidad_postulantes > 0 ? 'green' : 'black';
					var etiquetaHTML = item.cantidad_postulantes > 0 ? 'b' : 'p';
					html += '<td><' + etiquetaHTML + ' style="color:' + color + ';">';
					html += item.cantidad_postulantes;
					html += '</' + etiquetaHTML + '></td>';

					var color = item.esperando_confirmacion_de_pago > 0 ? 'red' : 'black';
					var etiquetaHTML = item.esperando_confirmacion_de_pago > 0 ? 'b' : 'p';
					html += '<td><' + etiquetaHTML + ' style="color:' + color + ';">';
					html += item.esperando_confirmacion_de_pago;
					html += '</' + etiquetaHTML + '></td>';

					var color = item.pagados > 0 ? 'green' : 'black';
					var etiquetaHTML = item.pagados > 0 ? 'b' : 'p';
					html += '<td><' + etiquetaHTML + ' style="color:' + color + ';">';
					html += item.pagados;
					html += '</' + etiquetaHTML + '></td>';

					var color = item.agendados > 0 ? 'green' : 'black';
					var etiquetaHTML = item.agendados > 0 ? 'b' : 'p';
					html += '<td><' + etiquetaHTML + ' style="color:' + color + ';">';
					html += item.agendados;
					html += '</' + etiquetaHTML + '></td>';

					html += '<td>';
					html += item.fecha_registro;
					html += '</td>';

					html += '<td>';
					html += item.estado_html;
					html += '</td>';
					html += '<td>';
					html += '<div class="btn-group">';
					// html += '<button class="btn btn-info" onclick="editarExamen('+item.id_certificacion+');">Administrar</button>';
					html += '<button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>';
					html += '<ul class="dropdown-menu">';
					html += '<li><a href="#" onclick="cambiarEstadoExamen(' + item.id_certificacion + ');">' + (item.estado == 1 ? 'Desactivar' : 'Activar') + '</a></li>';
					html += '</ul>';
					html += '</div>';
					html += '</td>';
					html += '</tr>';
				});
			} else {
				html += '<tr><td colspan="6" style="text-align:center;">No existen registros.</td><tr>';
			}
			$("#tbl_certificaciones tbody").html(html);
		},
		url: "Panel_Sede/getExamenes"
	});
}

function getSalas() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			var html = '';
			$("#tbl_salas tbody").html(html);
			if (result.length > 0) {
				$.each(result, function (i, item) {
					html += '<tr>';
					html += '<td>';
					html += item.nombre_sala;
					html += '</td>';
					html += '<td>';
					html += item.capacidad;
					html += '</td>';

					html += '<td>';
					html += '<div class="btn-group">';
					// html += '<button class="btn btn-info" onclick="editarExamen('+item.id_certificacion+');">Administrar</button>';
					html += '<button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>';
					html += '<ul class="dropdown-menu">';
					// html += '<li><a href="#" onclick="cambiarEstadoExamen(' + item.id_certificacion + ');">' + (item.estado == 1 ? 'Desactivar' : 'Activar') + '</a></li>';
					html += '</ul>';
					html += '</div>';
					html += '</td>';
					html += '</tr>';
				});
			} else {
				html += '<tr><td colspan="6" style="text-align:center;">No existen registros.</td><tr>';
			}
			$("#tbl_salas tbody").html(html);
		},
		url: "Panel_Sede/getSalas"
	});
}

function getExamenesCBXALL() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			if (result.length > 0) {
				var html = "";
				html += '<option value="">Seleccione</option>';
				$.each(result, function (i, item) {
					html += '<option value="' + item.id_certificacion + '">' + item.nombre_certificacion + '</option>';
				});
				$("#examen_cbx").html(html);
			} else {
				$("#examen_cbx").html('<option value="">No hay exámenes</option>');
			}

		},
		url: "Panel_Sede/getExamenesCBXALL"
	});
}

function cambiarEstadoExamen(id_certificacion) {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: {
			id_certificacion: id_certificacion
		},
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			cargaElementos();
		},
		url: "Panel_Sede/cambiarEstadoExamen"
	});
}

function getPostulantes() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		beforeSend: function () {
			$("#alerta").css({
				'display': 'none'
			});
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			var html = '';
			$("#tbl_postulantes tbody").html(html);
			if (result.length > 0) {
				cargaDataTable(result, '#tbl_postulantes');
			} else {
				html += '<tr><td colspan="6" style="text-align:center;">No existen registros.</td><tr>';
			}
			$("#tbl_postulantes tbody").html(html);
		},
		url: "Panel_Sede/getPostulantes"
	});
}

function setPostulante() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#form-agregar-postulante").serialize(),
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-agregar-postulante .alerta").css({
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
			$("#form-agregar-postulante .alerta").text("Hubo un problema al actualizar los datos: " + errorThrown);
			$("#form-agregar-postulante .alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			$("#form-agregar-postulante .alerta").text(result[0].mensaje);
			$("#form-agregar-postulante .alerta").css({
				'display': 'block'
			});
			if (result[0].respuesta == 1) {
				cargaElementos();
			}
		},
		url: "Panel_Sede/setPostulante"
	});
}

function setSala() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#form-agregar-sala").serialize(),
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-agregar-sala .alerta").css({
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
			$("#form-agregar-sala .alerta").text("Hubo un problema al actualizar los datos: " + errorThrown);
			$("#form-agregar-sala .alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			$("#form-agregar-sala .alerta").text(result[0].mensaje);
			$("#form-agregar-sala .alerta").css({
				'display': 'block'
			});
			if (result[0].respuesta == 1) {
				cargaElementos();
			}
		},
		url: "Panel_Sede/setSala"
	});
}

function simularHorarios() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#form-simular-horarios").serialize(),
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-agregar-sala .alerta").css({
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
			$("#form-simular-horarios .alerta").text("Hubo un problema en la simulacion " + errorThrown);
			$("#form-simular-horarios .alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			console.log(result);
			var html = "";
			$("#resultado_simulacion").html("");
			html += '<table id="tbl_resultado_simulacion" class="table table-bordered table-striped">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>#';
			html += '</th>';
			html += '<th>Horario';
			html += '</th>';
			html += '<th>Eliminar';
			html += '</th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(result, function (i, item) {
				html += '<tr rid="' + i + '">';
				html += '<td>';
				html += (i + 1);
				html += '</td>';
				html += '<td>';
				html += item;
				html += '</td>';
				html += '<td>';
				html += '<button class="btn btn-danger" onclick="deleteRow(' + i + ')">Eliminar</button>';
				html += '</td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '</table> <br><br>';
			html += '<button class="btn btn-success" onclick="ingresarBloques()">Ingresar Este Horario</button><br><br>';
			$("#resultado_simulacion").html(html);

		},
		url: "Panel_Sede/simularHorarios"
	});
}

function deleteRow(element) {
	$('[rid=' + element + ']').remove();
}

function ingresarBloques() {
	swal({
		title: 'Atención',
		text: "¿Esta completamente seguro(a)?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#138C45',
		cancelButtonColor: '#EE2039',
		confirmButtonText: 'Absolutamente',
		cancelButtonText: 'No'
	}).then((result) => {
		if (result.value) {
			cargaDeBloques();
		}
	});
}

function cargaDeBloques() {

	var id_sala = $("#salas_cbx").val();
	var bloques = makeJsonFromTable('tbl_resultado_simulacion');
	var bloqueDefinitivo = [];
	var tiempo_entre_examenes = $('#tiempo_entre_examenes').val();

	for (let i = 0; i < bloques.value.length; i++) {
		var bloque = {
			id_sala: id_sala,
			fecha_inicio: bloques.value[i].Horario,
			tiempo_entre_examenes: tiempo_entre_examenes
		}
		insertBloque(bloque);

		if((i+1 == bloques.value.length)){
			$("#upload-log-bloques").prepend('<div class="alert alert-success" role="alert"><b>Horarios Ingresados</b></div>');
		}
	}

	console.log(bloqueDefinitivo);


}

function insertBloque(data) {

	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: data,
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
			});
			$("#form-agregar-sala .alerta").css({
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
			$("#upload-log-bloques").prepend('<div class="alert alert-danger" role="alert"><b>'+errorThrown+'</b></div>');
		},
		success: function (result) {
			if (result[0].respuesta == 0) {
				$("#upload-log-bloques").prepend('<div class="alert alert-warning" role="alert"><b>' + result[0].mensaje + '</b></div>');
			}
		},
		url: "Panel_Sede/setHorariosSala"
	});
}

function aprobarRechazarTransferenciaBancaria() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#frm-confirma-pago").serialize(),
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
			$("#frm-confirma-pago .alerta").text("Hubo un problema al confirmar el pago");
			$("#frm-confirma-pago .alerta").css({
				'display': 'block'
			});
			swal({
				title: 'Error',
				text: "Hubo un problema al actualizar el pago",
				type: 'error',
				showCancelButton: false,
				confirmButtonColor: '#138C45',
				confirmButtonText: 'Aceptar',
				allowOutsideClick: false
			});
		},
		success: function (result) {
			if (result[0].respuesta == 1) {
				$("#frm-confirma-pago")[0].reset();
				$('#modal-confirmar-pago').modal('hide');
				$('#modal-confirmar-pago').css({
					'display': 'none'
				});
				cargaElementos();
			} else {
				swal({
					title: 'Error',
					text: result[0].mensaje,
					type: 'error',
					showCancelButton: false,
					confirmButtonColor: '#138C45',
					confirmButtonText: 'Aceptar',
					allowOutsideClick: false
				});
			}
		},
		url: "Panel_Sede/aprobarRechazarTransferenciaBancaria"
	});
}

function cargaDataTable(data, tableId) {
	var strName;
	var aoColumns = [];
	$(tableId).DataTable();
	if ($.fn.dataTable.isDataTable(tableId)) {
		$(tableId).DataTable().destroy();
	}
	for (strName in data[0]) {
		var column = {
			"mDataProp": strName
		};
		aoColumns.push(column);
	}
	aoColumns.push({
		"mDataProp": null,
		"bSortable": false,
		"mRender": function (o) {
			var html = "";
			html += '<div class="btn-group">';
			html += '<button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">Opciones <span class="caret"></span></button>';
			html += '<ul class="dropdown-menu">';
			if (o.estado == '<b style="color:red;">CONFIRMAR TRANSFERENCIA BANCARIA</b>') {
				dataPostulante = [];
				html += '<li><a onClick="verificarPago('+o.id_postulacion+',\''+o.nombre+'\',\''+o.rut+'\')">Verificar Pago</a></li>';

			}
			html += '<li><a onClick="editarPostulante('+o.id_postulante+')">Editar</a></li>'
			html += '</ul>';
			html += '</div>';
			return html;
		}
	});
	$(tableId).DataTable({

		"aaData": data,
		"aoColumns": aoColumns,
		"bLengthChange": false,
		pageLength: 5,
		responsive: true,
		order: [
			[0, "desc"]
		],
		"language": {
			"url": "res/js/dataTables.spanish.lang"
		},
		initComplete: function () {
			this.api().columns([5]).every(function () {
				var column = this;
				var select = $('<select><option value="">Filtrar Por Exámen</option></select>')
					.appendTo($(column.header()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});

				column.cells('', column[0]).render('display').sort().unique().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});
	// $(tableId+' thead tr th:first-child', this.node()).trigger('click');
}

function verificarPago(id_postulacion, nombre, rut) {
	$("#frm-confirma-pago")[0].reset();
	$('.modal-title').text('Confirmar el pago de ' + nombre);
	$('#rut_pago').val(rut);
	var dataPago = getDatosTransferenciaBancaria(id_postulacion);
	$('#id_postulacion_pago').val(id_postulacion);
	$('#fecha_pago').val(dataPago[0].fecha_pago);
	$('#hora_pago').val(dataPago[0].hora_pago);
	$('#observaciones_pago').text(dataPago[0].observaciones);
	// $('#comprobante_pago').attr('href', dataPago[0].comprobante);
	$('#comprobante_pago').unbind();
	$('#comprobante_pago').click(function(){
		dataPago = getDatosTransferenciaBancaria(id_postulacion);
		let pdfWindow = window.open("");
		pdfWindow.document.write("<iframe width='100%' height='100%' src='" + dataPago[0].comprobante +"'></iframe>");
	});
	
	$('#modal-confirmar-pago').modal('show');
}
function editarPostulante(id_postulante) {
	$.ajax({
        async: true,
        cache: false,
        dataType: "text",
        type: 'POST',
        data: { id_postulante: id_postulante },
        beforeSend: function () {
            $("#loader").css({ 'display': 'block' });
        },
        complete: function () {
            $("#loader").css({ 'display': 'none' });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // code en caso de error de la ejecucion del ajax
            console.log(textStatus + errorThrown);
        },
        success: function (result) {
            eval(result);
        },
        url: "Panel_Sede/editarPostulante"
    });
}
function getDatosTransferenciaBancaria(id_postulacion) {
	var xresult;
	$.ajax({
		async: false,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: {
			id_postulacion: id_postulacion
		},
		beforeSend: function () {
			$("#loader").css({
				'display': 'block'
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
		},
		success: function (result) {
			// console.log(result);
			xresult = result;
		},
		url: "Panel_Sede/getDatosTransferenciaBancaria"
	});
	return xresult;
}

function cargaMasiva() {
	$("#loader").css({
		'display': 'block'
	});
	if ($("#id_examen_carga_masiva").val() != '') {
		columnasrepetidas = [];
		var tieneColumnasSeleccionadas = false;
		var Duplicados = tieneValoresDuplicados();
		$("#validadores_columnas td").each(function (index) {
			if ($(this).children('select').val() != '') {
				tieneColumnasSeleccionadas = true;
			}
		});

		if (tieneColumnasSeleccionadas && !Duplicados) {
			var columnas_seleccionadas = [];
			var columnas_eliminadas = [];
			$("#validadores_columnas td").each(function (index) {
				if ($(this).children('select').val() != '') {
					var columna = {
						id: index,
						nombre: $(this).children('select').val()
					};
					columnas_seleccionadas.push(columna);
				} else {
					columnas_eliminadas.push(index);
				}
			});

			$("#htmlout table thead tr th").each(function (index) {
				var eliminable = false;
				for (let i = 0; i < columnas_eliminadas.length; i++) {
					if (columnas_eliminadas[i] == $(this).attr('colid')) {
						eliminable = true;
						break;
					}
				}
				if (eliminable) {
					$(this).remove();
				}
			});

			$("#validadores_columnas td").each(function (index) {
				var eliminable = false;
				for (let i = 0; i < columnas_eliminadas.length; i++) {
					if (columnas_eliminadas[i] == $(this).attr('colid')) {
						eliminable = true;
						break;
					}
				}
				if (eliminable) {
					$(this).remove();
				}
			});

			$("#htmlout table tbody tr").each(function (index) {
				$(this).find('td').each(function (j) {
					$(this).attr('colid', j);
				});
			});

			$("#htmlout table tbody tr").each(function (index) {
				$(this).find('td').each(function (j) {
					var eliminable = false;
					for (let i = 0; i < columnas_eliminadas.length; i++) {
						if (columnas_eliminadas[i] == $(this).attr('colid')) {
							eliminable = true;
							break;
						}
					}
					if (eliminable) {
						$(this).remove();
					}
				});
			});


			var filas = [];
			$("#htmlout table tbody tr").each(function (i) {
				var celdas = [];
				var fila = {
					id: i,
					celdas: []
				}

				$(this).find('td').each(function (j) {
					var celda = {
						id: j,
						texto: $(this).text()
					}
					celdas.push(celda);
				});
				fila.celdas = celdas;

				filas.push(fila);
			});
			$('#htmlout').html('');

			$('#btn_guardar_masiva').prop('disabled', true);

			$('#upload-status').append('<h4>Carga masiva ejecutándose. Espere hasta que se complete el proceso.</h4><div class="progress progress-striped active"><div class="bar" style="width: 0%;">0%</div></div>');
			for (let i = 0; i < filas.length; i++) {
				setPostulanteCM(filas, i, columnas_seleccionadas);
			}



		} else {
			if (Duplicados) {
				var itemsduplicados = "";
				columnasrepetidasFinal = columnasrepetidas;

				for (let i = 0; i < columnasrepetidas.length; i++) {
					if ((i + 1) == columnasrepetidas.length) {
						itemsduplicados += columnasrepetidas[i] + '. ';
					} else {
						itemsduplicados += columnasrepetidas[i] + ', ';
					}

				}

				swal({
					title: 'Error',
					text: "Ha nombrado una o más columnas con el mismo valor: " + itemsduplicados,
					type: 'error',
					showCancelButton: false,
					confirmButtonColor: '#138C45',
					confirmButtonText: 'Aceptar',
					allowOutsideClick: false
				});
			} else {
				swal({
					title: 'Error',
					text: "¡No hay columnas seleccionadas!",
					type: 'error',
					showCancelButton: false,
					confirmButtonColor: '#138C45',
					confirmButtonText: 'Aceptar',
					allowOutsideClick: false
				});
			}

		}
	} else {
		swal({
			title: 'Error',
			text: "Debe seleccionar una sede",
			type: 'error',
			showCancelButton: false,
			confirmButtonColor: '#138C45',
			confirmButtonText: 'Aceptar',
			allowOutsideClick: false
		});
	}
	$("#loader").css({
		'display': 'none'
	});

}

function tieneValoresDuplicados() {
	var hayDuplicados = false;
	$('#validadores_columnas td').each(function (i) { //primer each

		var $valorAComprobar = $(this).find('select').val();

		$('#validadores_columnas td').each(function (j) { //segundo each
			if ($valorAComprobar == $(this).find('select').val() && $valorAComprobar != '' && i != j) {
				hayDuplicados = true;

				if (columnasrepetidas.length > 0) {
					duplicadoYaEstaEnArray = false;
					for (let i = 0; i < columnasrepetidas.length; i++) {
						if (columnasrepetidas[i] === $(this).find('select option:selected').text()) {
							duplicadoYaEstaEnArray = true;
							break;
						}
					}
					if (!duplicadoYaEstaEnArray) {
						columnasrepetidas.push($(this).find('select option:selected').text());
					}
				} else {
					columnasrepetidas.push($(this).find('select option:selected').text());
				}
			}
		});
	});
	return hayDuplicados;
}

function setPostulanteCM(datos, i, columnas) {
	postulante = {};
	for (let j = 0; j < columnas.length; j++) {
		postulante[columnas[j].nombre] = datos[i].celdas[j].texto;
	}
	postulante.id_certificacion = $("#id_examen_carga_masiva").val();

	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: postulante,
		beforeSend: function () {},
		complete: function () {
			$('.progress .bar').css({
				'width': Math.round(((i / datos.length) * 100)) + '%'
			});
			$('.progress .bar').text(Math.round(((i / datos.length) * 100)) + '%');
			if (Math.round(((i / datos.length) * 100)) >= 100) {
				$('.progress').removeClass('active').addClass('progress-success');
				$('.progress .bar').text('Carga Masiva Completada.');
			}
			if ((i + 1) >= datos.length) {
				$('#btn_guardar_masiva').prop('disabled', false);
				$("#upload-log").prepend('<div class="alert alert-success" role="alert">FIN DE CARGA DE DATOS: <b style="color:green">' + registrosExitosos + '</b> Registros Correctos, <b style="color:red">' + registrosErroneos + '</b> Registros con Errores.</div>');
				getPostulantes();
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			// code en caso de error de la ejecucion del ajax
			console.log(textStatus + errorThrown);
			$("#upload-log").prepend('<div class="alert alert-danger" role="alert">Registro con dato: ' + datos[i].celdas[0].texto + ' falló al guardar.</div>');
			registrosErroneos++;
		},
		success: function (result) {
			if (result[0].resultado == 1) {
				registrosExitosos++;
			} else if (result[0].resultado == 2) {
				$("#upload-log").prepend('<div class="alert alert-warning" role="alert">Registro con dato: ' + datos[i].celdas[0].texto + '<b>' + result[0].mensaje + '</b></div>');
				registrosExitosos++;
			} else {
				$("#upload-log").prepend('<div class="alert alert-danger" role="alert">Registro con dato: ' + datos[i].celdas[0].texto + ' falló al guardar. Causa <b>' + result[0].mensaje + '</b></div>');
				registrosErroneos++;
			}
		},
		url: "Panel_Sede/cargaMasiva"
	});
}
