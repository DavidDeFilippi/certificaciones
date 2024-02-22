var postulantes = [];
$(document).ready(function () {
	if (!location.href.includes('Pago')) {
		getSedesCBX();

	}
	$("#form-agregar-usuario").submit(function () {
		setUsuario();
		event.preventDefault();
	});

	$('#sede_cbx_reservas').change(function () {});

	$("#frm-getReporte").submit(function () {
		getReporte();
		event.preventDefault();
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

function getReporte() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#frm-getReporte").serialize(),
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
			$("#out-reportes").html("");
			console.log(result[0].tipo);
			switch (parseInt(result[0].tipo)) {
				case 1:
					html += '<button id="btn_excel" class="btn btn-primary" >Descargar Excel</button>';
					html += '<table id="tbl_reportes" class="table table-bordered table-striped">';
					html += '<thead>';
					html += '<tr>';
					html += '<th>Sede';
					html += '</th>';
					html += '<th>Horario';
					html += '</th>';
					html += '<th>Sala';
					html += '</th>';
					html += '<th>Nombre';
					html += '</th>';
					html += '<th>Apellido';
					html += '</th>';
					html += '<th>RUT';
					html += '</th>';
					html += '<th>Email';
					html += '</th>';
					html += '<th>Perfil';
					html += '</th>';
					html += '<th>Confirmación de Pago';
					html += '</th>';
					html += '<th>Asiste';
					html += '</th>';
					html += '<th>Ausente';
					html += '</th>';
					html += '</tr>';
					html += '</thead>';
					html += '<tbody>';
					$.each(result, function (i, item) {
						html += '<tr>';
						html += '<td>';
						html += item.Sede;
						html += '</td>';
						html += '<td>';
						html += item.Horario;
						html += '</td>';
						html += '<td>';
						html += item.Sala;
						html += '</td>';
						html += '<td>';
						html += item.Nombre;
						html += '</td>';
						html += '<td>';
						html += item.Apellido;
						html += '</td>';
						html += '<td>';
						html += item.RUT;
						html += '</td>';
						html += '<td>';
						html += item.Email;
						html += '</td>';
						html += '<td>';
						html += item.Perfil;
						html += '</td>';
						html += '<td>';
						html += item['Confirmación de Pago'];
						html += '</td>';
						html += '<td>';
						html += item.Asiste;
						html += '</td>';
						html += '<td>';
						html += item.Ausente;
						html += '</td>';
						html += '</tr>';
					});
					html += '</tbody>';
					html += '</table> <br><br>';
					break;
					case 2:
					html += '<button id="btn_excel" class="btn btn-primary" >Descargar Excel</button>';
					html += '<table id="tbl_reportes" class="table table-bordered table-striped">';
					html += '<thead>';
					html += '<tr>';
					html += '<th>Sede';
					html += '</th>';
					html += '<th>Horario';
					html += '</th>';
					html += '<th>Sala C2';
					html += '</th>';
					html += '<th>Sala C3';
					html += '</th>';
					html += '<th>Asistentes';
					html += '</th>';
					html += '<th>Ausentes';
					html += '</th>';
					html += '<th>Ev. T. Soporte';
					html += '</th>';
					html += '<th>Ev. Prog Web';
					html += '</th>';
					html += '</tr>';
					html += '</thead>';
					html += '<tbody>';
					$.each(result, function (i, item) {
						html += '<tr>';
						html += '<td>';
						html += item.Sede;
						html += '</td>';
						html += '<td>';
						html += item.Horario;
						html += '</td>';
						html += '<td>';
						html += item['SALA C2'];
						html += '</td>';
						html += '<td>';
						html += item['SALA C3'];
						html += '</td>';
						html += '<td>';
						html += item.Asistentes;
						html += '</td>';
						html += '<td>';
						html += item.Ausentes;
						html += '</td>';
						html += '<td>';
						html += item.t_soporte;
						html += '</td>';
						html += '<td>';
						html += item.prog_web;
						html += '</td>';
						html += '</tr>';
					});
					html += '</tbody>';
					html += '</table> <br><br>';
					break;
					case 3:
					html += '<button id="btn_excel" class="btn btn-primary" >Descargar Excel</button>';
					html += '<table id="tbl_reportes" class="table table-bordered table-striped">';
					html += '<thead>';
					html += '<tr>';
					html += '<th>Sede';
					html += '</th>';
					html += '<th>Horario';
					html += '</th>';
					html += '<th>Sala';
					html += '</th>';
					html += '<th>Nombre';
					html += '</th>';
					html += '<th>Apellido';
					html += '</th>';
					html += '<th>RUT';
					html += '</th>';
					html += '<th>Email';
					html += '</th>';
					html += '<th>Perfil';
					html += '</th>';
					html += '<th>Confirmación de Pago';
					html += '</th>';
					html += '<th>Codigo';
					html += '</th>';
					html += '<th>Asiste';
					html += '</th>';
					html += '</tr>';
					html += '</thead>';
					html += '<tbody>';
					$.each(result, function (i, item) {
						html += '<tr>';
						html += '<td>';
						html += item.Sede;
						html += '</td>';
						html += '<td>';
						html += item.Horario;
						html += '</td>';
						html += '<td>';
						html += item.Sala;
						html += '</td>';
						html += '<td>';
						html += item.Nombre;
						html += '</td>';
						html += '<td>';
						html += item.Apellido;
						html += '</td>';
						html += '<td>';
						html += item.RUT;
						html += '</td>';
						html += '<td>';
						html += item.Email;
						html += '</td>';
						html += '<td>';
						html += item.Perfil;
						html += '</td>';
						html += '<td>';
						html += item['Confirmación de Pago'];
						html += '</td>';
						html += '<td>';
						html += item.Codigo
						html += '</td>';
						html += '<td>';
						html += item.Asiste;
						html += '</td>';
						html += '</tr>';
					});
					html += '</tbody>';
					html += '</table> <br><br>';
					break;
				case 4:
					html += '<button id="btn_excel" class="btn btn-primary" >Descargar Excel</button>';
					html += '<table id="tbl_reportes" class="table table-bordered table-striped">';
					html += '<thead>';
					html += '<tr>';
					html += '<th>Sede';
					html += '</th>';
					html += '<th>Fecha Reserva';
					html += '</th>';
					html += '<th>Sala';
					html += '</th>';
					html += '<th>Nombre';
					html += '</th>';
					html += '<th>Apellido';
					html += '</th>';
					html += '<th>RUT';
					html += '</th>';
					html += '<th>Email';
					html += '</th>';
					html += '<th>Perfil';
					html += '</th>';
					html += '<th>Confirmación de Pago';
					html += '</th>';
					html += '<th>Reservados en esa fecha';
					html += '</th>';
					html += '<th>Total hasta la fecha';
					html += '</th>';
					html += '</tr>';
					html += '</thead>';
					html += '<tbody>';
					$.each(result, function (i, item) {
						html += '<tr>';
						html += '<td>';
						html += item.Sede;
						html += '</td>';
						html += '<td>';
						html += item.Fecha_reserva;
						html += '</td>';
						html += '<td>';
						html += item.Sala;
						html += '</td>';
						html += '<td>';
						html += item.Nombre;
						html += '</td>';
						html += '<td>';
						html += item.Apellido;
						html += '</td>';
						html += '<td>';
						html += item.RUT;
						html += '</td>';
						html += '<td>';
						html += item.Email;
						html += '</td>';
						html += '<td>';
						html += item.Perfil;
						html += '</td>';
						html += '<td>';
						html += item['Confirmación de Pago'];
						html += '</td>';
						html += '<td>';
						html += item['Reservados en esta fecha']
						html += '</td>';
						html += '<td>';
						html += item['Total Reservados'];
						html += '</td>';
						html += '</tr>';
					});
					html += '</tbody>';
					html += '</table> <br><br>';
					break;
					case 5:
					html += '<button id="btn_excel" class="btn btn-primary" >Descargar Excel</button>';
					html += '<table id="tbl_reportes" class="table table-bordered table-striped">';
					html += '<thead>';
					html += '<tr>';
					html += '<th>N°';
					html += '</th>';
					html += '<th>Nombre Postulante';
					html += '</th>';
					html += '<th>RUT Postulante';
					html += '</th>';
					html += '<th>Email Postulante';
					html += '</th>';
					html += '<th>Fecha de nacimiento';
					html += '</th>';
					html += '<th>Nacionalidad';
					html += '</th>';
					html += '<th>Cmuna de domicilio';
					html += '</th>';
					html += '<th>Dirección de domicilio';
					html += '</th>';
					html += '<th>Teléfono celular';
					html += '</th>';
					html += '<th>Situación laboral';
					html += '</th>';
					html += '<th>Perfil';
					html += '</th>';
					html += '<th>Fecha exámen';
					html += '</th>';
					html += '<th>Modalidad de pago';
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
						html += item.nombre_postulante;
						html += '</td>';
						html += '<td>';
						html += item.rut_completo;
						html += '</td>';
						html += '<td>';
						html += item.correo_electronico;
						html += '</td>';
						html += '<td>';
						html += item.fecha_ncaimiento;
						html += '</td>';
						html += '<td>';
						html += item.nacionalidad;
						html += '</td>';
						html += '<td>';
						html += item.comuna;
						html += '</td>';
						html += '<td>';
						html += item.direccion;
						html += '</td>';
						html += '<td>';
						html += item.telefono_celular;
						html += '</td>';
						html += '<td>';
						html += item.laboral
						html += '</td>';
						html += '<td>';
						html += item.perfil;
						html += '</td>';
						html += '<td>';
						html += item.fecha_examen;
						html += '</td>';
						html += '<td>';
						html += item.modalidad_pago;
						html += '</td>';
						html += '</tr>';
					});
					html += '</tbody>';
					html += '</table> <br><br>';
					break;
			}
			$("#out-reportes").html(html);
			var wb = XLSX.utils.table_to_book(document.getElementById('tbl_reportes'), {
				sheet: "Sheet JS"
			});
			var wbout = XLSX.write(wb, {
				bookType: 'xlsx',
				bookSST: true,
				type: 'binary'
			});

			function s2ab(s) {
				var buf = new ArrayBuffer(s.length);
				var view = new Uint8Array(buf);
				for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
				return buf;
			}
			$("#btn_excel").click(function () {
				saveAs(new Blob([s2ab(wbout)], {
					type: "application/octet-stream"
				}), 'reporte.xlsx');
			});
		},
		url: "Reportes/getReporte"
	});
}
