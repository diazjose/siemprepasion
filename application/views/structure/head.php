<!DOCTYPE html>
<html>
	<head>
		<title>Siempre Futbol</title>

		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/font/css/open-iconic-bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/bootstrap-grid.min.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/bootstrap-reboot.min.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/bootstrap-grid.min.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/body.css">


	</head>
	<body>


		<header>
			<br>
			<div class="container-fluid">
				<div class="row">
					<div class="text-center col-md-4 hidden-sm-down">
						<img class="float-left img-fluid" src="<?= base_url() ?>public/images/Futbol-torneo3.jpg">
					</div>
					<div class="text-center col-md-4">
						<img class="mx-auto d-block img-fluid" src="<?= base_url() ?>public/images/Futbol-torneo6.jpg">
					</div>
					<div class="col-md-4 text-center hidden-xs-down 	">
						<img  class="float-right img-fluid" src="<?= base_url() ?>public/images/Futbol-torneo3.jpg">
					</div>
				</div>
			</div>
		</header>

		 
		 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
		  <!-- Brand -->
		  <a class="navbar-brand" href="#">SFutbol</a>

		  <!-- Toggler/collapsibe Button -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <!-- Navbar links -->
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
		      
		      <?php
			    	if ($viene == "home") {?>
				   	<li class="nav-item active">
				      <a class="nav-link disabled" href="<?= base_url() ?>">Home</a>
				    </li>
			    <?php
			    	}else{?>
			    	<li class="nav-item">
				      <a class="nav-link disabled" href="<?= base_url() ?>">Home</a>
				    </li>
			    <?php	
			    	}?>
			     	

			    <li class="nav-item">
			      <a class="nav-link" href="#">Noticias</a>
			    </li>
			    <?php
			    	if ($viene == "equipo") {?>
				   	<li class="nav-item active">
				      <a class="nav-link" href="<?= base_url() ?>equipos">Equipos</a>
				    </li>
			    <?php
			    	}else{?>
			    	<li class="nav-item">
			      		<a class="nav-link" href="<?= base_url() ?>equipos">Equipos</a>
			    	</li>
			    <?php	
			    	}
			       	if ($viene == "torneo") {?>
				   	<li class="nav-item active">
				      <a class="nav-link" href="<?= base_url() ?>torneo">Torneo</a>
				    </li>
			    <?php
			    	}else{?>
			    	<li class="nav-item">
			      		<a class="nav-link" href="<?= base_url() ?>Torneo">Torneo</a>
			    	</li>
			    <?php	
			    	}
			    ?>

		    </ul>
		  </div>
		</nav> 

		<br><br>

		

		