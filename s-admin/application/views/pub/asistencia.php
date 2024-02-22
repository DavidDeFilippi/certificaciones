<style>
	/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  width: 20% !important;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
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
		<h1>Libro de Clases</h1>
	</div>
	<!--End-breadcrumbs-->
	<div class="container-fluid">
		<hr>
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
				<h5>Buscar Libro de Clases</h5>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-content nopadding">
						<form class="form-horizontal">
							<div class="control-group">
								<label class="control-label">Sede:</label>
								<div class="controls">
									<select class="span5" id="sede_cbx_reservas" name="id_sede" required></select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Sala:</label>
								<div class="controls">
									<select class="span5" id="salas_cbx_reservas" name="id_sala" disabled required></select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Fecha:</label>
								<div class="controls">
									<select class="span5" id="fechas_cbx_reservas" name="fecha" disabled required></select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Bloque:</label>
								<div class="controls">
									<select class="span5" id="bloques_cbx_reservas" name="bloque" disabled required></select>
								</div>
							</div>
						</form>
						<div id="out-reservas" class="widget-content">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end-main-container-part-->
</div>
