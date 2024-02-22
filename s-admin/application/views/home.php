<!DOCTYPE html>
<html lang="en">

<head>
	<title>SEGACY Admin</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url();?>res/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>res/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>res/css/matrix-login.css" />
	<link href="<?php echo base_url();?>res/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url();?>res/css/style.css" rel="stylesheet" />


</head>

<body>
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
	<div id="loginbox">
		<form id="loginform" class="form-vertical">
			<div class="control-group normal_text">
				<h3><img src="<?php echo base_url();?>res/img/logo-nav.jpg" style="width: 50%;" alt="Logo" /></h3>
			</div>
			<div class="control-group">
				<div class="controls">
					<div class="main_input_box">
						<span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Rut" id="rut" name="rut"  onkeypress="return solonumero(event)" maxlength="8" required /><input id="dv" name="dv" type="text" placeholder="DV" maxlength="1" required />
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<div class="main_input_box">
						<span class="add-on bg_ly"><i class="icon-lock"></i></span><input id="contrasena" name="contrasena" type="password" placeholder="Contraseña"
						 required />
					</div>
				</div>
			</div>
			<div class="alert alert-danger" role="alert" id="alerta">
			</div>
			<div class="form-actions">
				<span class="pull-right">
					<button id="btn_login" class="btn btn-success">Iniciar Sesión</button>
			</div>
		</form>
	</div>

	<script src="<?php echo base_url();?>res/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>res/js/matrix.login.js"></script>
	<script src="<?php echo base_url();?>res/js/sys/all.js"></script>
</body>

</html>