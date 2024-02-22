<!DOCTYPE html>
<html lang="en">
<head>
<title>SEGACY S-Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>res/img/favicon.png">
<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/matrix-media.css" />
<link href="<?php echo base_url(); ?>res/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<?php
	for ($i = 0; $i < count($css_custom); $i++) {
		echo '<link rel="stylesheet" href="' . $css_custom[$i]['style'] . '">';
	}
  ?>
  <link href="<?php echo base_url();?>res/css/style.css" rel="stylesheet" />
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a>S-Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido(a) <?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido'); ?></span></a></li>
    <li class=""><a title="" href="<?php echo base_url();?>"><i class="icon icon-share-alt"></i> <span class="text">Cerrar Sesión</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
	