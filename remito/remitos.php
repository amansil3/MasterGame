<!DOCTYPE html>
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

	<!-- Loading Script -->
	<script src="jquery-1.8.3.js"></script>

	<style>
		body {
		    font-family: Arial;
		}
		
	</style>

	<!-- Assign UTF-8 -->
	<meta charset="utf-8" />

	<title>
		INDEX
	</title>

	</head>

	<body style="background-color: #eee;">
	
	<!-- Content -->
	
	<div class="content">
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" 
		style="position: sticky; z-index: 1071; top: 0;">
			<div class="d-flex justify-content-end">
		    <a class="navbar-brand" href="#"  style="color: #fff;">
			    <img src="/MasterGame/images/mg2.jpg" width="80" height="30" class="d-inline-block align-top" data-toggle="tooltip" data-placement="bottom" title="CRAPERO 3000 MASTER GAY">
			    Sistema de Logística
			</a>
		</nav>

	<!-- START OF PHP -->

		<?php
			require('Conectar.php');
		?>
		<?php
			//Conecto a la BD
			$pdo = conectar();

			//Ejecuto la consulta
			$consulta = $pdo->prepare("SELECT nro_remito, fecha, nombre, apellido, dni, telefono, producto, garantia, cantidad, valor FROM remitos");
			$consulta->execute();
			$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

			//Tabla
			echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center; margin-top: 3rem;">
					<thead class="thead-dark" style="text-align:center";>
						<tr>
							<th>N°</th>
							<th>Fecha</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>DNI</th>
							<th>Telefono</th>
							<th>Domicilio</th>
							<th>Localidad</th>
							<th>Productos</th>
							<th>Garantias</th>
							<th>Cantidad</th>
							<th>Valor</th>
							<th>Ver</th>
							<th>Modificar</th>
							<th>Borrar</th>
						</tr>
					</thead>
					<tbody>';
				foreach ($resultado as $remito) {
				    echo '<tr>';
					    echo '<td>'.$remito['nro_remito'].'</td>';
						echo '<td>'.$remito['fecha'].'</td>';
					    echo '<td>'.$remito['nombre'].'</td>';
						echo '<td>'.$remito['apellido'].'</td>';
						echo '<td>'.$remito['dni'].'</td>';
						echo '<td> a </td>';
						echo '<td> a </td>';
						echo '<td>'.$remito['telefono'].'</td>';
						echo '<td>'.$remito['producto'].'</td>';
						echo '<td>'.$remito['garantia'].'</td>';
						echo '<td>'.$remito['cantidad'].'</td>';
						echo '<td> $ '.$remito['valor'].'</td>';
					    echo '<td>
					    		<a href="verremito.php?id='.$remito['nro_remito'].'" class="btn btn-info">
					    			<i class="far fa-eye"></i>
					    		</a>
					    	  </td>';
					    echo '<td>
					    		<a href="modificarremito.php?id='.$remito['nro_remito'].'" class="btn btn-success">
					    			<i class="fa fa-edit"></i>
					    		</a>
					    	  </td>';
					    echo '<td>
					    		<a href="bajaremito.php?id='.$remito['nro_remito'].'" class="btn btn-danger">
					    			<i class="fa fa-trash-alt"></i>
					    		</a>
					    	  </td>
				    	</tr>';
				}
			echo '</tbody>
				</table>';
			?>
		<!-- END OF PHP -->

			<a href=/MasterGame/indexnico.html class="btn btn-success" style="margin-top: 2rem;">Volver al menu de Facturación</a>
			<a href=/MasterGame/index.html class="btn btn-success" style="margin-top: 2rem;">Volver al Inicio</a>