<!DOCTYPE html>
<html>
	<head>
	
	<!-- Load js files -->
	<script src="/MasterGame/jquery/jquery-3.2.1.min.js"></script>
	<script src="/MasterGame/js/bootstrap.bundle.js"></script>

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
		Clientes
	</title>
	</head>
	<body>

		<!-- Navbar -->

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" 
		style="position: sticky; z-index: 1071; top: 0;">
			
		    <a class="navbar-brand" href="#"  style="color: #fff;">
			    Sistema de Logística
			</a>

			<!-- Logo & Links to other pages -->
			<div class="nav navbar-nav navbar-right">
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav mr-auto">
			    		<li class="nav-item active">
			    			<a class="nav-link" href="/MasterGame/index.html" style="margin-right: 1rem; color: #fff;">Inicio <span class="sr-only">(current)</span></a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="/MasterGame/FichasEmpleados.php" style="color: #fff;">Personal</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="/MasterGame/FichasEmpleados.php" style="color: #fff;">Proveedores</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="/MasterGame/crud.php" style="color: #fff;">Clientes</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="/MasterGame/stock.php" style="color: #fff;">Gestionar Stock</a>
			    		</li>
			    	</ul>
			    	<span class="navbar-text">
			    	</span>
				</div>
			</div>
			<!-- End of Logo & Links to other pages -->

		</nav>
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

				<!-- Main body -->

				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" style="background-color: #eee;">
					<?php
						require('Conectar.php');
					?>
					<?php

						//Recibo por Post los datos ingresados en el formulario de crearseña.html
						$fecha= date("Y-m-d H:i:s");
						$nombre = $_POST['nombre'];
						$apellido = $_POST['apellido'];
						$dni = $_POST['dni'];
						$telefono = $_POST['telefono'];
						$producto = $_POST['producto'];
						$seña = $_POST['seña'];
						$valor = $_POST['valor'];
						$resto = $valor - $seña;

						//Conecto a la BD
						$pdo = conectar();

						//Ejecuto una consulta
						$insercion = $pdo -> prepare("INSERT INTO señas (fecha, nombre, apellido, dni, telefono, producto, seña, valor, resto) VALUES (:f, :e, :d, :c, :b, :a, :y, :z, :w);");

						//Bindeo los valores con los recibidos por post
						$insercion -> bindValue(':f',$fecha);
						$insercion -> bindValue(':e',$nombre);
						$insercion -> bindValue(':d',$apellido);
						$insercion -> bindValue(':c',$dni);
						$insercion -> bindValue(':b',$telefono);
						$insercion -> bindValue(':a',$producto);
						$insercion -> bindValue(':y',$seña);
						$insercion -> bindValue(':z',$valor);
						$insercion -> bindValue(':w',$resto);

						//Mediante un IF tiro un mensaje
						if ($insercion -> execute()) {
							//Si fue exitoso
						    echo "La seña fue agregada<br><a href=crearseña.html>Crear otra seña</a><br><a href=señas.php>Ver señas</a><br><a href=../index.html>Volver al Menu</a>";
						}
						else {
							//Si no se pudo cargar doy al usuario diferentes links para continuar
						    echo "Error al agregar la seña<br>
						    		<a href=crearseña.html>Volver a intentarlo</a><br>
						    		<a href=señas.php>Ver señas</a><br>
						    		<a href=../index.html>Volver al Menu</a>";
						}
					?>

				</main>

				<!-- Right Sidebar -->

				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
							<a href="/MasterGame/crearremito.html" style="color:#99979c"> 
								<i class="fa fa-plus" aria-hidden="true"></i> Crear un nuevo remito 
							</a> 
						</li>
						<li class="toc-entry toc-h2">
							<a href="/MasterGame/indexnico.html" style="color:#99979c">
								<i class="fa fa-file" aria-hidden="true"></i> Volver a Facturación
							</a>
						</li>
						<li class="toc-entry toc-h2">
							<a href="/MasterGame/index.html" style="color:#99979c">
								<i class="fa fa-home" aria-hidden="true"></i> Volver al inicio
							</a>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</body> 
</html>
