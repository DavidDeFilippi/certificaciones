var postulantes = [];
$(document).ready(function () {
    if (!location.href.includes('Pago')) {
        getSedesCBX();
        
    }
    $("#form-agregar-usuario").submit(function () {
        setUsuario();
        event.preventDefault();
    });

    $('#sede_cbx_reservas').change(function () {
			$('#out-reservas').html('');
			$('#salas_cbx_reservas').prop('disabled', true);
			$('#salas_cbx_reservas').html('');
			$('#fechas_cbx_reservas').prop('disabled', true);
			$('#fechas_cbx_reservas').html('');
			$('#bloques_cbx_reservas').prop('disabled', true);
			$('#bloques_cbx_reservas').html('');
			getSalasCBXBySede($(this).val());
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

function getSedesCBX() {
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
					html += '<option value="' + item.id_sede + '">' + item.nombre_sede + '</option>';
				});
				$("#sede_cbx_reservas").html(html);
			} else {
				$("#sede_cbx_reservas").html('<option value="">No hay fechas</option>');
			}
			$('#sede_cbx_reservas').prop('disabled', false);


		},
		url: "Asistencia/getSedesCBX"
	});
}
function getSalasCBXBySede(id_sede) {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data:{id_sede:id_sede},
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
			$('#salas_cbx_reservas').prop('disabled', false);


		},
		url: "Asistencia/getSalasCBXBySede"
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
		url: "Asistencia/getFechasSalaCBX"
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
		url: "Asistencia/getBloquesFechaBySala"
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
			html += '<div class="widget-content nopadding">';
			html += '<button onClick="generatePDF(\'tbl_asistencia_print\')" class="btn btn-success pull-left">Generar PDF</button>';
			html += '<button id="btnGuardarAsistencia" onClick="setAsistencia('+$('#bloques_cbx_reservas').val()+')" class="btn btn-warning pull-right">Guardar asistencia</button>';
			html += '</div>';
			html += '<table id="tbl_asistencia" class="table table-bordered table-striped">';
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
			html += '<th>Asiste';
			html += '</th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(result, function (i, item) {
				html += '<tr rid="' + i + '" id_cupo="'+item.id_cupo+'">';
				html += '<td>';
				html += (i+1);
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
				html += '<label class="container">Asiste<input type="checkbox" class="asiste" value="1" checked="checked"><span class="checkmark"></span></label>';
				html += '</td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '</table> <br><br>';
			
			html += '<table id="tbl_asistencia_print" style="display:none;" class="table table-bordered table-striped">';
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
			html += '<th>Firma';
			html += '</th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(result, function (i, item) {
				html += '<tr>';
				html += '<td>';
				html += (i+1);
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
				html += ' ';
				html += '</td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '</table> <br><br>';
			$("#out-reservas").html(html);
		},
		url: "Asistencia/getCuposbyIdBloque"
	});
}

function generatePDF(id_table){

    var doc = new jsPDF();
    doc.setFontSize(20);
    doc.text("SEGACY", 14, 10);
    doc.setFontSize(10);
    
    doc.text("Asistencia Examen de certificación SFIA", 14, 15);
    doc.text($('#fechas_cbx_reservas option:selected').text(), 14, 19);
    doc.text('ID Bloque: '+$('#bloques_cbx_reservas').val(), 14, 23);
    doc.text($('#bloques_cbx_reservas option:selected').text(), 14, 27);
	
    var elem = document.getElementById(id_table);
    
	var res = doc.autoTableHtmlToJson(elem);
	// res.columns.splice(-1, 1);
	
	doc.autoTable(res.columns, res.data, {startY: 30,
		theme: 'grid',
		headerStyles: {
			overflow: 'linebreak',
			fontSize: 9
		},
		columnStyles: {
			0: {columnWidth: 15,overflow: 'linebreak', halign: 'left', fontSize: 9},
			1: {columnWidth: 35,overflow: 'linebreak', halign: 'left', fontSize: 9},
			2: {columnWidth: 50,overflow: 'linebreak', halign: 'left', fontSize: 9},
			3: {columnWidth: 45,overflow: 'linebreak', halign: 'left', fontSize: 9},
			4: {columnWidth: 45,overflow: 'linebreak', halign: 'left', fontSize: 9}
		}
	});

    doc.save('Lista_postulantes_bloque_'+$('#bloques_cbx_reservas').val()+'.pdf');
}

function setAsistencia(id_bloque){
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
			$("#out-reservas").prepend('<div id="progreso"><h4>Espere hasta que se complete el proceso.</h4><div class="progress progress-striped active"><div class="bar" style="width: 0%;">0%</div></div></div>');
			$("#btnGuardarAsistencia").prop('disabled', true);
			postulantes = [];
			$("#tbl_asistencia tbody tr").each(function (index) {
					var postulante = {
						id_bloque: id_bloque,
						id_cupo: $(this).attr('id_cupo'),
						asiste: $(this).children('td').find('.asiste').attr("checked") ? 1 : 0
					};
					postulantes.push(postulante);
			});
			for (let i = 0; i < postulantes.length; i++) {
				insertAsistenciaPostulante(postulantes[i], i);
			}
		}
	});
	
}

function insertAsistenciaPostulante(element,i){
	i = i == 0 ? 1 : i;
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: element,
		beforeSend: function () {},
		complete: function () {
			$('.progress .bar').css({
				'width': Math.round(((i / postulantes.length) * 100)) + '%'
			});
			$('.progress .bar').text(Math.round(((i / postulantes.length) * 100)) + '%');
			if (Math.round(((i / postulantes.length) * 100)) >= 100) {
				$('.progress').removeClass('active').addClass('progress-success');
				$('.progress .bar').text('Ingreso de asistencia completado.');
			setTimeout(function(){ $('#progreso').remove() }, 10000);

			}
			if ((i + 1) >= postulantes.length) {
			$("#btnGuardarAsistencia").prop('disabled', false);
				
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			// code en caso de error de la ejecucion del ajax
			console.log(textStatus + errorThrown);
		},
		success: function (result) {

		},
		url: "Asistencia/insertAsistenciaPostulante"
	});
}