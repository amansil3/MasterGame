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
			<div class="d-flex justify-content-end">
		    <a class="navbar-brand" style="color: #fff;">
			    Sistema de Logística
			</a>
			<div class="nav navbar-nav navbar-right">
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav mr-auto">
			    		<li class="nav-item active">
			    			<a class="nav-link" href="../index.html" style="margin-right: 1rem; color: #fff;">Inicio <span class="sr-only">(current)</span></a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../FichasEmpleados.php" style="color: #fff;">Personal</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../FichasEmpleados.php" style="color: #fff;">Proveedores</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../crud.php" style="color: #fff;">Clientes</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../stock.php" style="color: #fff;">Gestionar Stock</a>
			    		</li>
			    	</ul>
			    	<span class="navbar-text">
			    	</span>
				</div>
			</div>
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

				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
					<?php
						require('../Conectar.php');

						$pdo = conectar();
						//La función conectar() está definida en Conectar.php, y conecta a la BD, 
						//retornando un objeto de clase PDO con la conexión.

						$consulta = $pdo->prepare("SELECT socios.nombre as socio, socios.apellido, socios.DNI, socios.id  FROM socios");

						//Aqui no hay parámetros, puede ejecutarse esta consulta con
						// $pdo->query(), lo omitimos por brevedad.

						$consulta -> execute();
						$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

						//Mostramos los resultados en una tabla:
						echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
								<thead class="thead-dark" style="text-align:center";>
									<tr>
										<th scope="col">Nombre</th>
										<th scope="col">Apellido</th>
										<th scope="col">DNI</th>
										<th scope="col">Editar</th>
										<th scope="col">Borrar</th>
									</tr>
								</thead>
								<tbody>';
									foreach ($resultado as $elSocio) {
									    echo '<tr>';
									    echo '<td>'. $elSocio['socio']. '</td>';
									    echo '<td>'. $elSocio['apellido'] .'</td>';
									    echo '<td style="text-align=center">'. $elSocio['DNI'] .'</td>';

									    //Celda con el link para editar:
									   echo '<td>
									    		<a href="modificar.php?id='.$elSocio['id'].'">
									    			<button class="btn btn-info">
										    			<i class="far fa-edit"></i>	
										    		</button>
									    		</a>
									    	 </td>';
									    //Celda con el link para eliminar:
									    echo '<td>
									    		<a href="baja.php?id='.$elSocio['id'].'">
									    			<button class="btn btn-danger">
										    			<i class="far fa-trash-alt"></i>	
										    		</button>
									    		</a>
									    	 </td>
									   	</tr>';
									}
								echo '</tbody>
							  </table>';
					?>
				</main>

				<!-- Right Sidebar -->

				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
							<a href="formAlta.php" style="color:#99979c"> 
								<i class="fa fa-plus" aria-hidden="true"></i> Dar de alta a un nuevo cliente 
							</a> 
						</li>
						<li class="toc-entry toc-h2">
							<a href="index.html" style="color:#99979c">
								<i class="fa fa-home" aria-hidden="true"></i> Volver al inicio
							</a>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</body> 
</html>
