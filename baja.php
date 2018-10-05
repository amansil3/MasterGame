<html>
	<head>
	
	<!-- Load js files -->
	<script src="/object/jquery/jquery-3.2.1.min.js"></script>
	<script src="/object/js/bootstrap.bundle.js"></script>

	<!-- Load CSS & Icons library -->
	<link rel="stylesheet" href="/object/css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Responsive design for mobile navigation -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		body {
		    font-family: Arial;
		}
	</style>

	<!-- Assign UTF-8 -->
	<meta charset="utf-8" />

	<title>
		Baja
	</title>
	</head>
	<body>

		<!-- Navbar -->

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" 
		style="position: sticky; z-index: 1071; top: 0;">

		    <a class="navbar-brand" href="#">
			    <img src="/object/images/cn.png" width="80" height="30" class="d-inline-block align-top" alt="">
			    Club de Natación
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
		    		<li class="nav-item active">
		    			<a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
		    		</li>
		    		<li class="nav-item">
		    			<a class="nav-link" href="Consulta.php">Personal</a>
		    		</li>
		    		<li class="nav-item">
		    			<a class="nav-link" href="crud.php">Socios</a>
		    		</li>
		    	</ul>
		    	<span class="navbar-text">
		    	</span>
			</div>
		</nav>

		<!-- End of Navbar -->

		<!-- Content -->
		<div class="container-fluid" style="margin-top: 3rem;">
			<div class="row flex-xl-nowrap">

				<!-- Left Sidebar -->

				<div class="col-12 col-md-3 col-xl-2 bd-sidebar">
					helloworld!
					helloworld!
					helloworld!
					helloworld!
				</div>

				<!-- End of Sidebar -->

				<!-- Main body -->

				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">

					<?php
					require('Conectar.php');
					?>

					<?php

					//conecto a la BD
					$pdo = conectar();

					//Preparamos la eliminacion
					$eliminacion=$pdo->prepare("DELETE FROM socios WHERE id=:numeroRecibido");

					//Vinculamos el parámetro :numeroRecibido con el id recibido por GET:
					$eliminacion->bindValue(':numeroRecibido',$_GET['id']);

					//Ejecutamos la eliminación, mostrando un mensaje de éxito o error según corresponda:
					if($eliminacion->execute()) {
					    echo "Socio eliminado correctamente";
					}
					else {
					    echo "Error al eliminar al socio";
					}

					?>

					<a href="crud.php"> Volver a la pagina de socios </a>

				</main>

				<!-- End of Main Body-->

				<!-- Right Sidebar -->

				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
							<a href="formAlta.php" style="color:#99979c"> 
								<i class="fa fa-plus" aria-hidden="true"></i> Dar de alta a un nuevo socio 
							</a> 
						</li>
						<li class="toc-entry toc-h2">
							<a href="index.html" style="color:#99979c">
								<i class="fa fa-home" aria-hidden="true"></i> Volver al inicio
							</a>
						</li>
					</ul>
				</div>

				<!-- End of  Sidebar -->

			</div>

		</div>

		<!-- End of Content -->

	</body> 
</html>
