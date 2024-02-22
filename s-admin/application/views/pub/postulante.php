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
		<h1>Datos del Postulante:
			<nombre_postulante></nombre_postulante>
		</h1>
	</div>
	<!--End-breadcrumbs-->

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<!-- frtm postulantes -->
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>Editar datos del postulante</h5>
					</div>
					<div class="widget-content nopadding">

						<form id="form-editar-postulante" class="form-horizontal">
							<div class="control-group">
								<label class="control-label">Rut :</label>
								<div class="controls">
									<input type="text" name="rut" id="rut" class="form-control" onkeypress="return solonumero(event)" maxlength="8"
									 style="width:40%; margin-right:1%; text-align:right;" required>
									<input type="text" name="dv" id="dv" class="form-control" maxlength="1" style="width:5%;" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Nombre(s) :</label>
								<div class="controls">
									<input type="text" class="span11" id="nombre" name="nombre">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Apellido Paterno :</label>
								<div class="controls">
									<input type="text" class="span11" id="apellido_paterno" name="apellido_paterno">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Apellido Materno :</label>
								<div class="controls">
									<input type="text" class="span11" id="apellido_materno" name="apellido_materno">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Fecha de Nacimiento :</label>
								<div class="controls">
									<input type="date" class="span11" id="fecha_nacimiento" name="fecha_nacimiento">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Género :</label>
								<div class="controls">
										<select name="sexo" id="sexo" class="form-control" required>
												<option>Seleccione</option>
												<option value="M">Masculino</option>
												<option value="F">Femenino</option>
											</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Email :</label>
								<div class="controls">
									<input type="email" class="span11" id="correo_electronico" name="correo_electronico">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Teléfono :</label>
								<div class="controls">
									<input type="text" class="span11" id="telefono_celular" name="telefono_celular">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Dirección :</label>
								<div class="controls">
									<input type="text" class="span11" id="direccion" name="direccion">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Comuna :</label>
								<div class="controls">
									<input type="text" class="span11" id="comuna" name="comuna">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Región :</label>
								<div class="controls">
									<input type="text" class="span11" id="region" name="region">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Situación Laboral :</label>
								<div class="controls">
									<select name="laboral" id="laboral" class="form-control" required>
										<option value="">Seleccione</option>
										<option value="Dependiente">Dependiente</option>
										<option value="Independiente">Independiente</option>
										<option value="Cesante">Cesante</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<div class="alert alert-warning alerta" role="alert">
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
	<!--end-main-container-part-->
</div>