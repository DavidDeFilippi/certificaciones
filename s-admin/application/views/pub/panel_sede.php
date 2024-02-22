<style>
	#drop{
			border:2px dashed #bbb;
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			border-radius:5px;
			padding:25px;
			text-align:center;
			font-size:20pt; 
			font-weight: bold;
			color:#bbb;
			margin-left: 10px;
			margin-right: 10px;
		}
		#b64data{
			width:100%;
		}
		#tbl_postulantes tbody tr{
			background-color: #f9f9f9 !important;
		}
		#tbl_postulantes tbody tr:last-child td{
			border-bottom: 1px solid #ddd !important;
		}
		#pestanas a{
			font-weight: bold;
		}
		a{
			cursor: pointer !important;
		}
		#comprobante_pago{
			width: 100%;
			border: 5px solid #ddd;
		}
		.labels label{
			font-size: 150%;
			font-weight: bold;
		}
		.modal{
			z-index: 1000 !important;
		}
</style>
<div id="loader">
	<svg class="lds-typing" width="200px" height="200px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	 viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;">
		<circle cx="12.5" cy="37.7955" r="5" fill="#ee2039">
			<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
			 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.5s"></animate>
		</circle>
		<circle cx="27.5" cy="41.0037" r="5" fill="#ce3293">
			<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
			 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.4166666666666667s"></animate>
		</circle>
		<circle cx="42.5" cy="48.4858" r="5" fill="#ffcd11">
			<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
			 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.3333333333333333s"></animate>
		</circle>
		<circle cx="57.5" cy="62.5" r="5" fill="#cc6728">
			<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
			 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.25s"></animate>
		</circle>
		<circle cx="72.5" cy="62.5" r="5" fill="#1899c4">
			<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
			 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.16666666666666666s"></animate>
		</circle>
		<circle cx="87.5" cy="62.5" r="5" fill="#138c45">
			<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
			 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.08333333333333333s"></animate>
		</circle>
	</svg>
</div>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
	<?php  
$this->load->view('pub_template/sidebar');
?>
</div>
<!--sidebar-menu-->
<!--main-container-part-->
<div id="content">
	<!--breadcrumbs-->
	<div id="content-header">
		<div id="breadcrumb"> <a title="" class="tip-bottom"></a></div>
		<h1>Panel de control correspondiente a la sede:
			<nombre_sede></nombre_sede>
		</h1>
	</div>
	<!--End-breadcrumbs-->

	<div class="container-fluid">
		<hr>
		<ul id="pestanas" class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#sede">Datos de la Sede</a></li>
			<li><a data-toggle="tab" href="#examenes">Exámenes</a></li>
			<li><a data-toggle="tab" href="#postulantes">Postulantes</a></li>
			<li><a data-toggle="tab" href="#salas">Salas</a></li>
			<li><a data-toggle="tab" href="#reservas">Reservas</a></li>
		</ul>
		<div class="tab-content">
			<!-- SEDE -->
			<div id="sede" class="tab-pane fade in active">
				<div class="row-fluid">
					<div class="span12">
						<!-- //frm datos basicos -->
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Datos de La Sede</h5>
							</div>
							<div class="widget-content nopadding">
								<form id="form-sede" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Nombre :</label>
										<div class="controls">
											<input type="hidden" name="id_sede" required>
											<input type="text" class="span11" name="nombre_sede" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Dirección :</label>
										<div class="controls">
											<input type="text" class="span11" name="direccion_sede">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Contacto (fono o email) :</label>
										<div class="controls">
											<input type="text" class="span11" name="fono_sede">
										</div>
									</div>
									<div class="control-group">
										<div class="alert alert-danger alerta" role="alert">
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- EXÁMENES -->
			<div id="examenes" class="tab-pane fade">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Exámenes</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped" id="tbl_certificaciones" style="width: 100%;">
									<thead>
										<tr>
											<th>Certificación</th>
											<th>Valor Copago</th>
											<th>Fecha Inicio</th>
											<th>Fecha Término</th>
											<th>Postulantes</th>
											<th>Esperando Confirmacion de Pago</th>
											<th>Pagados</th>
											<th>Agendados</th>
											<th>Fecha Creación</th>
											<th>Estado</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Agregar un examen existente a esta sede</h5>
							</div>
							<div class="widget-content nopadding">
								<form id="form-agregar-examen-cbx" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Examen :</label>
										<div class="controls">
											<select class="span11" id="examen_cbx" name="examen" required></select>
										</div>
									</div>
									<div class="control-group">
										<div class="alert alert-danger alerta" role="alert">
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Agregar</button>
									</div>
								</form>
							</div>

							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Agregar un nuevo examen</h5>
							</div>
							<div class="widget-content nopadding">

								<form id="form-agregar-examen" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Nombre :</label>
										<div class="controls">
											<input type="text" class="span11" id="nombre_certificacion" name="nombre_certificacion" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Fecha Inicio :</label>
										<div class="controls">
											<input type="date" class="span11" id="fecha_inicio" name="fecha_inicio" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Fecha Término :</label>
										<div class="controls">
											<input type="date" class="span11" id="fecha_termino" name="fecha_termino" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Valor Copago (CLP) : <b>$</b></label>
										<div class="controls">
											<input type="text" onkeypress="return solonumero(event)" class="span11" id="valor_certificacion" name="valor_certificacion"
											 required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Estado :</label>
										<div class="controls">
											<select name="estado" id="estado" required>
												<option value="">Seleccione</option>
												<option value="1">Activo</option>
												<option value="0">Inactivo</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<div class="alert alert-danger alerta" role="alert">
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- POSTULANTES -->
			<div id="postulantes" class="tab-pane fade">
				<div class="row-fluid">
					<div class="span12">
						<!-- frtm postulantes -->
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Postulantes</h5>
							</div>
							<div class="widget-content nopadding">
								<br>
								<table id="tbl_postulantes" class="table table-bordered" style="width: 100% !important;">
									<thead>
										<tr>
											<th>ID</th>
											<th>ID Postulacion</th>
											<th>RUT</th>
											<th>Nombre</th>
											<th>E-mail</th>
											<th>Sede</th>
											<th>Estado</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Agregar un nuevo postulante</h5>
							</div>
							<div class="widget-content nopadding">

								<form id="form-agregar-postulante" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Rut :</label>
										<div class="controls">
											<input type="text" name="rut" id="rut_nuevo_postulante" class="form-control" onkeypress="return solonumero(event)"
											 maxlength="8" style="width:60%; margin-right:1%; text-align:right;" required>
											<input type="text" name="dv" id="dv_nuevo_postulante" class="form-control" maxlength="1" style="width:20%;"
											 required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Nombre(s) :</label>
										<div class="controls">
											<input type="text" class="span11" id="nombre_nuevo_postulante" name="nombre">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Apellido Paterno :</label>
										<div class="controls">
											<input type="text" class="span11" id="apellido_paterno_nuevo_postulante" name="apellido_paterno">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Apellido Materno :</label>
										<div class="controls">
											<input type="text" class="span11" id="apellido_materno_nuevo_postulante" name="apellido_materno">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Email :</label>
										<div class="controls">
											<input type="email" class="span11" id="correo_electronico_nuevo_postulante" name="correo_electronico">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Teléfono :</label>
										<div class="controls">
											<input type="text" class="span11" id="telefono_nuevo_postulante" name="telefono">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Examen :</label>
										<div class="controls">
											<select id="id_examen_nuevo_postulante" name="examen" required>
											</select>
										</div>
									</div>
									<div class="control-group">
										<div class="alert alert-danger alerta" role="alert">
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- CARGA MASIVA -->
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-warning-sign" style="color:orange"></i></span>
								</span>
								<h5>Carga Masiva de Postulantes</h5>
							</div>
							<div class="widget-content nopadding">
								<form id="frm-carga-masiva" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Seleccione Exámen :</label>
										<div class="controls">
											<select id="id_examen_carga_masiva" name="id_certificacion" required>
											</select>

										</div>
									</div>
									<input type="hidden" name="format" value="html" onchange="setfmt()">
									<div class="control-group">
										<div id="drop">
											<h1>Arrastre el archivo excel acá</h1>
										</div>
									</div>

									<br>
									<div class="control-group">
										<label class="control-label">O suba el archivo aquí:</label>
										<div class="controls">
											<input type="file" name="xlfile" id="xlf" />
										</div>
									</div>
									<div style="display:none">
										<textarea id="b64data"></textarea>
										<input type="button" id="dotext" value="Click here to process the base64 text" onclick="b64it();" />
										<input type="checkbox" name="useworker" checked>
										<input type="checkbox" name="userabs" checked>
									</div>
									<pre id="out" style="display:none"></pre>
									<div class="control-group" id="texto-cargando" style="text-align:center;display:none;">
										<div class="controls" style="margin-left:5%;">
											<h4>Cargando datos, un momento por favor...</h4>
											<svg class="lds-typing" width="100px" height="100px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
											 viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;">
												<circle cx="12.5" cy="37.7955" r="5" fill="#ee2039">
													<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5"
													 repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.5s"></animate>
												</circle>
												<circle cx="27.5" cy="41.0037" r="5" fill="#ce3293">
													<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5"
													 repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.4166666666666667s"></animate>
												</circle>
												<circle cx="42.5" cy="48.4858" r="5" fill="#ffcd11">
													<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5"
													 repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.3333333333333333s"></animate>
												</circle>
												<circle cx="57.5" cy="62.5" r="5" fill="#cc6728">
													<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5"
													 repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.25s"></animate>
												</circle>
												<circle cx="72.5" cy="62.5" r="5" fill="#1899c4">
													<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5"
													 repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.16666666666666666s"></animate>
												</circle>
												<circle cx="87.5" cy="62.5" r="5" fill="#138c45">
													<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5"
													 repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.08333333333333333s"></animate>
												</circle>
											</svg>
										</div>
									</div>
									<div class="control-group">
										<div id="htmlout" style="width: 100%;"></div>
									</div>

									<div class="form-actions">
										<button type="submit" id="btn_guardar_masiva" class="btn btn-success">Guardar</button>
									</div>
									<div class="control-group" id="upload-status">
									</div>
									<div class="control-group" id="upload-log">
									</div>


									<div class="control-group">
										<!-- uncomment the next line here and in xlsxworker.js for encoding support -->
										<script src="<?php echo base_url(); ?>res/js/libexcel/dist/cpexcel.js"></script>
										<script src="<?php echo base_url(); ?>res/js/libexcel/shim.js"></script>
										<script src="<?php echo base_url(); ?>res/js/libexcel/jszip.js"></script>
										<script src="<?php echo base_url(); ?>res/js/libexcel/xlsx.js"></script>
										<script>
											/*jshint browser:true */
											/* eslint-env browser */
											/*global Uint8Array, console */
											/*global XLSX */
											/* exported b64it, setfmt */
											/* eslint no-use-before-define:0 */
											var X = XLSX;
											var XW = {
												/* worker message */
												msg: 'xlsx',
												/* worker scripts */
												worker: '<?php echo base_url(); ?>res/js/libexcel/xlsxworker.js'
											};

											var global_wb;

											var process_wb = (function () {
												var OUT = document.getElementById('out');
												var HTMLOUT = document.getElementById('htmlout');

												var get_format = (function () {
													var radios = document.getElementsByName("format");
													return function () {
														for (var i = 0; i < radios.length; ++i)
															if (radios[i].checked || radios.length === 1) return radios[i].value;
													};
												})();

												var to_json = function to_json(workbook) {
													var result = {};
													workbook.SheetNames.forEach(function (sheetName) {
														var roa = X.utils.sheet_to_json(workbook.Sheets[sheetName], {
															header: 1
														});
														if (roa.length) result[sheetName] = roa;
													});
													return JSON.stringify(result, 2, 2);
												};

												var to_csv = function to_csv(workbook) {
													var result = [];
													workbook.SheetNames.forEach(function (sheetName) {
														var csv = X.utils.sheet_to_csv(workbook.Sheets[sheetName]);
														if (csv.length) {
															result.push("SHEET: " + sheetName);
															result.push("");
															result.push(csv);
														}
													});
													return result.join("\n");
												};

												var to_fmla = function to_fmla(workbook) {
													var result = [];
													workbook.SheetNames.forEach(function (sheetName) {
														var formulae = X.utils.get_formulae(workbook.Sheets[sheetName]);
														if (formulae.length) {
															result.push("SHEET: " + sheetName);
															result.push("");
															result.push(formulae.join("\n"));
														}
													});
													return result.join("\n");
												};

												var to_html = function to_html(workbook) {

													HTMLOUT.innerHTML = "";
													workbook.SheetNames.forEach(function (sheetName) {
														var htmlstr = X.write(workbook, {
															sheet: sheetName,
															type: 'string',
															bookType: 'html'
														});
														HTMLOUT.innerHTML += htmlstr;
													});
													$("#htmlout").children('table').addClass('table').addClass('table-bordered').addClass('data-table');
													var primera_fila = $("#htmlout").children('table').children('tbody').children('tr:first').html().replace(
														new RegExp('<td', 'g'), '<th').replace(new RegExp('</td>', 'g'), '</th>');
													$("#htmlout").children('table').children('tbody').children('tr:first').remove();
													$("#htmlout").children('table').children('tbody').before('<thead><tr>' + primera_fila + '</tr></thead>');
													var cantidad_columnas = $("#htmlout").children("table").children('thead').children('tr').find('th').length;

													var selects_html = "";
													selects_html += '<tr id="validadores_columnas">';
													for (let i = 0; i < cantidad_columnas; i++) {

														selects_html += '<td colid="' + i + '">';
														selects_html += '<select id="columna_' + (i + 1) + '">';
														selects_html += '<option value="" syle="color:red;">Omitir</option>';
														selects_html += '<option value="rut_completo" syle="color:green;">RUT Completo</option>';
														selects_html += '<option value="rut" syle="color:green;">RUT sin DV</option>';
														selects_html += '<option value="dv" syle="color:green;">Digito Verificador</option>';
														selects_html += '<option value="nombre_completo" syle="color:green;">Nombre Completo</option>';
														selects_html += '<option value="nombres" syle="color:green;">Nombres</option>';
														selects_html += '<option value="apellidos" syle="color:green;">Apellidos</option>';
														selects_html += '<option value="apellido_paterno" syle="color:green;">Apellido Paterno</option>';
														selects_html += '<option value="apellido_materno" syle="color:green;">Apellido Materno</option>';
														selects_html += '<option value="telefono" syle="color:green;">Teléfono</option>';
														selects_html += '<option value="email" syle="color:green;">Email</option>';
														selects_html += '<option value="genero" syle="color:green;">Género</option>';
														selects_html += '<option value="f_nac" syle="color:green;">Fecha de Nacimiento</option>';
														selects_html += '<option value="nacionalidad" syle="color:green;">Nacionalidad</option>';
														selects_html += '<option value="direccion" syle="color:green;">Dirección</option>';
														selects_html += '<option value="comuna" syle="color:green;">Comuna</option>';
														selects_html += '<option value="region" syle="color:green;">Región</option>';
														selects_html += '<option value="s_laboral" syle="color:green;">Situacion Laboral</option>';
														selects_html += '</select>';
														selects_html += '</td>';
													}
													selects_html += "</tr>";
													$("#htmlout").children('table').children('tbody').before(selects_html);
													$("#htmlout table thead tr").each(function (index) {
														$(this).find('th').each(function (j) {
															$(this).attr('colid', j);
														});
													});
													//celda editable
													$("#htmlout table tbody tr td").prop('contenteditable', true);
													//celda editable (color de fondo)
													$("#htmlout table tbody tr td").css({
														'background': '#fff'
													});
													$("#texto-cargando div").html('');
													$("#texto-cargando div").css({
														'text-align': 'left'
													});
													$("#texto-cargando div").append('<h5>Consejos:</h5>');
													$("#texto-cargando div").append('<ul>');
													$("#texto-cargando div").append('<li>La siguiente tabla es 100% editable.</li>');
													$("#texto-cargando div").append(
														'<li>Debe Ud. identificar las columnas necesarias para la carga de los datos.</li>');
													$("#texto-cargando div").append(
														'<li>Prefiera las columnas como "RUT" (Sin digito verificador), "Digito verificador", "Nombre(s)", "Apellido Materno", "Apellido Paterno"</li>'
													);
													$("#texto-cargando div").append(
														'<li>NO Prefiera las columnas como "RUT Completo" o "Nombre Completo". Uselas sólo si no existe otra alternativa.</li>'
													);
													$("#texto-cargando div").append(
														'<li>Utilice columnas donde los valores sean "M" o "F" (mayúsculas o minúsculas), para género.</li>');
													$("#texto-cargando div").append(
														'<li>CORFO entrega información que ellos confirman con SII. Dele prioridad a esas columnas si no esta seguro(a) cual elegir (Ej."Cruce SII - Con esto corfo confirma el género.").</li>'
													);
													$("#texto-cargando div").append('</ul>');

													$("#texto-cargando div").append('<h5>COLUMNAS OBLIGATORIAS:</h5>');
													$("#texto-cargando div").append('<ul>');
													$("#texto-cargando div").append('<li>RUT y DV (O RUT Completo).</li>');
													$("#texto-cargando div").append('<li>Email.</li>');
													$("#texto-cargando div").append('</ul>');

													return "";
												};

												return function process_wb(wb) {
													global_wb = wb;
													var output = "";
													switch (get_format()) {
														case "form":
															output = to_fmla(wb);
															break;
														case "html":
															output = to_html(wb);
															break;
														case "json":
															output = to_json(wb);
															break;
														default:
															output = to_csv(wb);
													}
													if (OUT.innerText === undefined) OUT.textContent = output;
													else OUT.innerText = output;
													if (typeof console !== 'undefined') console.log("output", new Date());
												};
											})();

											var setfmt = window.setfmt = function setfmt() {
												if (global_wb) process_wb(global_wb);
											};

											var b64it = window.b64it = (function () {
												var tarea = document.getElementById('b64data');
												return function b64it() {
													if (typeof console !== 'undefined') console.log("onload", new Date());
													var wb = X.read(tarea.value, {
														type: 'base64',
														WTF: false
													});
													process_wb(wb);
												};
											})();

											var do_file = (function () {
												var rABS = typeof FileReader !== "undefined" && (FileReader.prototype || {}).readAsBinaryString;
												var domrabs = document.getElementsByName("userabs")[0];
												if (!rABS) domrabs.disabled = !(domrabs.checked = false);

												var use_worker = typeof Worker !== 'undefined';
												var domwork = document.getElementsByName("useworker")[0];
												if (!use_worker) domwork.disabled = !(domwork.checked = false);

												var xw = function xw(data, cb) {
													var worker = new Worker(XW.worker);
													worker.onmessage = function (e) {
														switch (e.data.t) {
															case 'ready':
																break;
															case 'e':
																console.error(e.data.d);
																break;
															case XW.msg:
																cb(JSON.parse(e.data.d));
																break;
														}
													};
													worker.postMessage({
														d: data,
														b: rABS ? 'binary' : 'array'
													});
												};

												return function do_file(files) {
													rABS = domrabs.checked;
													use_worker = domwork.checked;
													var f = files[0];
													var reader = new FileReader();
													reader.onload = function (e) {
														if (typeof console !== 'undefined') console.log("onload", new Date(), rABS, use_worker);
														var data = e.target.result;
														if (!rABS) data = new Uint8Array(data);
														if (use_worker) xw(data, process_wb);
														else process_wb(X.read(data, {
															type: rABS ? 'binary' : 'array'
														}));
													};
													if (rABS) reader.readAsBinaryString(f);
													else reader.readAsArrayBuffer(f);
												};
											})();

											(function () {
												var drop = document.getElementById('drop');
												if (!drop.addEventListener) return;

												function handleDrop(e) {
													e.stopPropagation();
													e.preventDefault();
													do_file(e.dataTransfer.files);
												}

												function handleDragover(e) {
													e.stopPropagation();
													e.preventDefault();
													e.dataTransfer.dropEffect = 'copy';
												}

												drop.addEventListener('dragenter', handleDragover, false);
												drop.addEventListener('dragover', handleDragover, false);
												drop.addEventListener('drop', handleDrop, false);
											})();

											(function () {
												var xlf = document.getElementById('xlf');
												if (!xlf.addEventListener) return;

												function handleFile(e) {
													$("#texto-cargando").css({
														'display': 'block'
													});
													do_file(e.target.files);
												}
												xlf.addEventListener('change', handleFile, false);
											})();
											var _gaq = _gaq || [];
											_gaq.push(['_setAccount', 'UA-36810333-1']);
											_gaq.push(['_trackPageview']);

											(function () {
												var ga = document.createElement('script');
												ga.type = 'text/javascript';
												ga.async = true;
												ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
													'.google-analytics.com/ga.js';
												var s = document.getElementsByTagName('script')[0];
												s.parentNode.insertBefore(ga, s);
											})();

										</script>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Salas -->
			<div id="salas" class="tab-pane fade">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Salas</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped" id="tbl_salas" style="width: 100%;">
									<thead>
										<tr>
											<th>Nombre Sala</th>
											<th>Capacidad</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Agregar una nueva Sala</h5>
							</div>
							<div class="widget-content nopadding">

								<form id="form-agregar-sala" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Nombre:</label>
										<div class="controls">
											<input type="text" class="span11" name="nombre_sala" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Capacidad:</label>
										<div class="controls">
											<input type="text" onkeypress="return solonumero(event)" class="span11" name="capacidad_sala" required>
										</div>
									</div>
									<div class="control-group">
										<div class="alert alert-danger alerta" role="alert">
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
								</form>
							</div>
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Agregar Horarios para exámenes</h5>
							</div>
							<div class="widget-content nopadding">
								<form id="form-simular-horarios" class="form-horizontal">


									<div class="control-group">
										<label class="control-label">Sala:</label>
										<div class="controls">
											<select class="span5" id="salas_cbx" name="id_sala" required></select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Fecha:</label>
										<div class="controls">
											<input type="date" class="span5" id="fecha_sala" name="fecha_inicio" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Hora del primer examen:</label>
										<div class="controls">
											<input type="time" class="span5" id="hora_primer_examen" name="hora_primer_examen" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Tiempo desde el comienzo de un examen hasta el siguiente (en minutos):</label>
										<div class="controls">
											<input type="text" onkeypress="return solonumero(event)" class="span5" id="tiempo_entre_examenes" name="tiempo_entre_examenes"
											 required>
										</div>
									</div>

									<div class="control-group">
											<label class="control-label">Hora en el que se debe desocupar la sala al final de la jornada:</label>
											<div class="controls">
													<input type="time" class="span5" id="hora_limite" name="hora_limite" required>
											</div>
										</div>

									<div class="control-group">
										<div class="alert alert-danger alerta" role="alert">
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Iniciar Simulación de Horarios</button>
									</div>
								</form>
							</div>
							<div class="widget-content nopadding" id="resultado_simulacion">
							</div>
							<div class="control-group" id="upload-log-bloques">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Reservas -->
			<div id="reservas" class="tab-pane fade">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Reservas</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped" id="tbl_salas_reservas" style="width: 100%;">
									<thead>
										<tr>
											<th>Nombre sala</th>
											<th>Cupos totales</th>
											<th>Cupos reservados</th>
											<th>Cupos disponibles</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>Reservas</h5>
							</div>
							<div class="widget-content nopadding">
								<form class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Sala:</label>
										<div class="controls">
											<select class="span5" id="salas_cbx_reservas" name="id_sala" required></select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Fecha:</label>
										<div class="controls">
											<select class="span5" id="fechas_cbx_reservas" name="fecha" disabled required></select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Horario:</label>
										<div class="controls">
											<select class="span5" id="bloques_cbx_reservas" name="bloque" disabled required></select>
										</div>
									</div>
								</form>
								<div id="out-reservas" class="widget-content nopadding">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end-main-container-part-->
</div>
<!-- MODAL CONFIRMAR PAGO POR TRANSFERENCIA BANCARIA -->
<div class="modal fade" id="modal-confirmar-pago" style="display:none;" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form id="frm-confirma-pago" class="form-horizontal">
					<div class="control-group">
						<label class="control-label">RUT :</label>
						<div class="controls">
							<input type="text" id="rut_pago" readonly>
							<input type="hidden" id="id_postulacion_pago" name="id_postulacion" readonly>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Fecha de Pago :</label>
						<div class="controls">
							<input type="date" id="fecha_pago" readonly>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Hora de Pago (puede ser aproximado) :</label>
						<div class="controls">
							<input type="time" id="hora_pago" readonly>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Observaciones :</label>
						<div class="controls">
							<textarea name="observaciones_pago" id="observaciones_pago" class="form-control" readonly></textarea>
						</div>
					</div>

					<label class="control-label">Comprobante :</label><br>
					<a id="comprobante_pago" target="_blank" href=""><b>VER COMPROBANTE<b></a>
					<br>
					<div class="control-group">
						<div class="controls labels">
							<label><input type="radio" name="resultado_pago" value="1" required />Aprobar</label>
						</div>
					</div>
					<div class="control-group">
						<div class="controls labels">
							<label><input type="radio" name="resultado_pago" value="0" />Rechazar</label>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Guardar</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
