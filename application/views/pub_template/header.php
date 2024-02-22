<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>res/img/favicon.png">
	<!-- ======= Titles ======= -->
	<title>Examenes Segacy</title>
	<!-- Bootsrap's latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/bootstrap.min.css">
	<?php
	for ($i = 0; $i < count($css_custom); $i++) {
		echo '<link rel="stylesheet" href="' . $css_custom[$i]['style'] . '">';
	}
	?>
	<!-- ======= cuestom css ======= -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/style.css">

</head>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
			 aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar" style="background-color: #EE2039; height: 5px;"></span>
				<span class="icon-bar" style="background-color: #CE3293; height: 5px;"></span>
				<span class="icon-bar" style="background-color: #FFCD11; height: 5px;"></span>
				<span class="icon-bar" style="background-color: #CC6728; height: 5px;"></span>
				<span class="icon-bar" style="background-color: #1899C4; height: 5px;"></span>
				<span class="icon-bar" style="background-color: #138C45; height: 5px;"></span>
			</button>
			<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>res/img/segacy.png"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url(); ?>">Inicio</a></li>
				<li><a href="https://www.segacy.com/" target="_new">Segacy</a></li>
				<li><a href="#">Contacto</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<body>