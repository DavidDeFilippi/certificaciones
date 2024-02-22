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
		<h1>Sedes</h1>
	</div>
	<!--End-breadcrumbs-->
	<div class="container-fluid">
		<hr>
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
				<h5>Sedes registradas en el sistema</h5>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped" id="tbl_sedes">
							<thead>
								<tr>
									<th>Nombre Sede</th>
									<th>Dirección</th>
									<th>Contacto</th>
									<th>Exámenes</th>
									<th>Postulaciones</th>
									<th>Esperando Confirmacion de Pago</th>
									<th>Pagados</th>
									<th>Agendados</th>
									<th>Fecha Creación Sede</th>
									<th>estado</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
				<h5>Agregar una nueva sede</h5>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-content nopadding">
						<form id="form-agregar-sede" class="form-horizontal">
							<div class="control-group">
								<label class="control-label">Nombre :</label>
								<div class="controls">
									<input type="text" class="span11" id="nombre_sede" name="nombre_sede" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Dirección :</label>
								<div class="controls">
									<input type="text" class="span11" id="direccion_sede" name="direccion_sede">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Contacto (fono o email) :</label>
								<div class="controls">
									<input type="text" class="span11" id="fono_sede" name="fono_sede">
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
</div>
<!--end-main-container-part-->
</div>
