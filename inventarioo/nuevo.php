<!DOCTYPE html>
<html>
	<head>
	
	<!-- Load js files -->
	<script src="/MasterGame/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/MasterGame/vendor/js/bootstrap.bundle.js"></script>

	<!-- Load CSS & Icons library -->
	<link rel="stylesheet" href="/MasterGame/css/bootstrap.css">
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
		Inventario
	</title>
	</head>
	<body>

		<!-- Navbar -->
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" 
		style="position: sticky;">
			<div class="d-flex justify-content-end">
		    <a class="navbar-brand" href="../index.html"  style="color: #fff;">
			    <img src="/MasterGame/images/mg2.jpg" width="80" height="30" class="d-inline-block align-top" data-toggle="tooltip" data-placement="bottom" title="Sistema de Logística Master Game">
			    Sistema de Logística
			   </a>
			<div class="nav navbar-nav navbar-right">
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav mr-auto">
			    		<li class="nav-item active">
			    			<a class="nav-link" href="../index.html" style="margin-right: 1rem; color: #fff;">Inicio <span class="sr-only">(current)</span></a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../empleados/FichasEmpleados.php" style="color: #fff;">Personal</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../proveedores/Proveedores.php" style="color: #fff;">Proveedores</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../clientes/crud.php" style="color: #fff;">Clientes</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../inventarioo/nuevo.php" style="color: #fff;">Gestionar Stock</a>
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
				</div>

				<!-- Main body -->
				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
					<?php
						/* Se incluye el archivo donde se encuentra la función conectar para conectarse al servidor */
						require('../Conectar.php');
					?>
					<?php
						/* Conexión al servidor */
						$pdo=conectar();

						echo "<h1>Listado de Productos</h1>";

						/* Se creará una simple tabla que mostrará todos los productos cargados y la opción de eliminarlos o modificarlos */
						$modificar= $pdo->prepare("SELECT id, nombre, marca, modelo, precio, activo FROM productos WHERE activo = 1 ORDER BY id ASC;");
						$modificar-> execute();
						$modificacion = $modificar->fetchAll(PDO::FETCH_ASSOC);
						
						/* Mostramos los resultados en una tabla: */

						/* Encabezado de la tabla */
						echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
								<thead class="thead-dark" style="text-align:center";>
									<tr>
										<th>Numero</th>
										<th>Producto</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Precio</th>
										<th>Baja</th>
										<th>Modificación</th>
										<th>Venta</th>
									</tr>
								</thead>';

							/* Cuerpo de la Tabla */
						foreach ($modificacion as $unaModificacion) {
							echo '<tr>';
							echo '<td>'.$unaModificacion['id'].'</td>';
							echo '<td>'.$unaModificacion['nombre'].'</td>';
							echo '<td>'.$unaModificacion['marca'].'</td>';
							echo '<td>'.$unaModificacion['modelo'].'</td>';
							echo '<td>'.$unaModificacion['precio'].'</td>';

							/* Link para eliminar un juego */
							if($unaModificacion['activo'] == 1) {
							
							/* Modal */
							echo '<td>
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal'.$unaModificacion['id'].'">
									  <i class="fa fa-trash-alt"></i>
									</button>';

									//Acá genero un modal para cada elemento del foreach
									echo '<div class="modal fade" id="Modal'.$unaModificacion['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';//Modal
									echo '<div class="modal-dialog" role="document">';
									    echo '<div class="modal-content">';
									      echo'<div class="modal-header">';
									        echo'<h5 class="modal-title" id="exampleModalLabel1">Borrar Producto</h5>'; //Titulo del Modal
									        echo'<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">'; //Boton X para cerrar el modal. Cuerpo del Modal

									      //Pregunto al usuario si de verdad quiere borrar el producto
									      echo "Desea borrar el producto ".$unaModificacion['nombre'].' de ID '.$unaModificacion['id']."?";
									      
									      $pdo = conectar();

											/* Preparamos la eliminacion */
											$eliminar=$pdo->prepare("DELETE FROM productos WHERE id=:num");

											
											/* Vinculamos el parámetro :num con el id que se obtiene por el foreach */
											$eliminar->bindValue(':num',$unaModificacion['id']);

											

										echo '<div class="modal-footer">'; //Pie del Modal
												echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, cerrar</button>'; //Cerrar Modal
												echo'<a class="btn btn-danger" href="baja.php?id='.$unaModificacion['id'].'">
												Borrar
												</a>'; //Aceptar la Baja, redirección
										echo '</div>
									  </td>'; //Cierre de TD
							}

							/* Link para modificar un juego */
							/* Modal */

							//Botón para abrir la ventana
							echo '<td>
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal'.$unaModificacion['id'].'">
									  <i class="fa fa-edit"></i>
									</button>';

									//Acá genero un modal para cada elemento del foreach
									echo '<div class="modal fade" id="exampleModal'.$unaModificacion['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel1">Modificar Producto</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">';

												//Conecto a la BD
									      	    $pdo = conectar();
	
												/* Se preparan los datos actuales de los juegos */
												$productoactual=$pdo->prepare("SELECT nombre, precio, marca, modelo FROM productos WHERE id=:num");
												
												/* Se linkea el parámetro :num con el id que se recibe por GET */
												$productoactual->bindValue(':num',$unaModificacion['id']);

												/* Se ejecuta la preparacion */
												$productoactual->execute();

												$info = $productoactual->fetchAll(PDO::FETCH_ASSOC);

												/* Se arma un simple formulario para ingresar la informacion nueva de los juegos */
												
												echo '<form action="prodmodificado.php" method="post">'; 
												echo "<input name='id' type='hidden' value='{$unaModificacion['id']}'>"; //Dirijo el ID
												echo "Nombre del producto: <input name='nombre' value='{$info[0]['nombre']}'><br>"; //Input Nombre
												echo "Marca: <input name='marca' value='{$info[0]['marca']}'><br>"; //Input Marca
												echo "Modelo: <input name='modelo' value='{$info[0]['modelo']}'><br>"; // Input Modelo
												echo "Precio: <input type='number' name='precio' value='{$info[0]['precio']}'>"; //Input Precio
												echo '<div class="modal-footer">'; //Pie del Modal
												echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>'; //Botón de cerrar
												echo '<button type="submit" class="btn btn-primary">Modificar producto</button>'; //Botón para enviar el formulario a prodmodificado.php
												echo '</form> 
												</div>										
									      </div>
									    </div>
									  </div>
									</div>

								  </td>';

								// Celda para declarar la venta del producto y cambiar su estado de activo 1 a 0
								echo '<td>
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal_venta'.$unaModificacion['id'].'">
									  <i class="fa fa-dollar-sign"></i>
									</button>'; //Botón para Abrir el Modal

									//Acá genero un modal para cada elemento del foreach
									echo '<div class="modal fade" id="Modal_venta'.$unaModificacion['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel1">Vender Producto</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									      	 <div class="container-fluid">
									      	 	<div class="row">';

											      		/* Pregunto al Usuario si quiere vender el producto*/

											      		echo "Asigne un valor de venta para ".$unaModificacion['nombre'].' '.$unaModificacion['marca'].' '.$unaModificacion['modelo'].'<br>';

												echo '</div>';
											    echo '<div class="row">';
											    
											      		//Conecto a la BD
											      	    $pdo = conectar();
			
														/* Preparamos la venta*/
														$producto=$pdo->prepare("SELECT activo FROM productos WHERE id=:num");
														
														/* Se linkea el parámetro :num con el id que se recibe por GET */
														$producto->bindValue(':num',$unaModificacion['id']);

														/* Se ejecuta la preparacion */
														$producto->execute();

														$info1 = $producto->fetchAll(PDO::FETCH_ASSOC);
														echo '<form action="venta.php" method="post">'; 
											      		echo '<input type="number" name="valor_venta" placeholder="Ingrese precio de venta" required> <br>';

											      echo'</div>';
											     echo '<div class="row">';
											      		echo '¿Quien realizo la venta?
											      		</div>
											      		<div class="row">';

											      		echo '<select name="empleado" required>';

												      		$pdo = conectar();

												      		$insercion = $pdo -> prepare("SELECT id, nombre, apellido FROM personales");
															$insercion -> execute();
															$ins1 = $insercion -> fetchAll(PDO::FETCH_ASSOC);

															foreach ($ins1 as $ins) {
																echo '<option style="margin-bottom: 1rem;" value="'.$ins['id'].'">'.$ins['nombre'].' '.$ins['apellido'].'</option>';
															}
														echo '</select>';

													echo'</div>';

													echo '<div class="row">';
											      		echo '¿Que cliente compró el producto?
											      		</div>
											      		<div class="row">';

											      		echo '<select name="cliente" required>';

												      		$pdo = conectar();

												      		$insercion = $pdo -> prepare("SELECT id, nombre, apellido FROM socios");
															$insercion -> execute();
															$ins1 = $insercion -> fetchAll(PDO::FETCH_ASSOC);
															
															foreach ($ins1 as $ins) {
																echo '<option style="margin-bottom: 1rem;" value="'.$ins['id'].'">'.$ins['nombre'].' '.$ins['apellido'].'</option>';
															}
														echo '</select>';
														
													echo'</div>';
												echo '</div>';
											echo '</div>';
												/*Pie del Modal*/
											echo '<div class="modal-footer" style="margin-top: 1rem;">';
												echo '<div class="row">';
												/* Se arma un simple formulario para ingresar la informacion nueva de los juegos */
												
												echo "<input name='id' type='hidden' value='{$unaModificacion['id']}'>"; //Dirijo el ID
												echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, cerrar</button>
													<button type="submit" class="btn btn-success">	
													Si, vender
													</button>
													</form>
											    </div>
											</div>'; /* /Cierre del pie del modal*/							
									 echo '</div>
									    </div>
									  </div>
									</div>
								  </td>
								</tr>';
						}
						?>
						</table style="margin-bottom: 3rem;">


						<!-- Tabla para Productos Vendidos -->
						<?php
						/* Conexión al servidor */
						$pdo=conectar();

						echo "<h1>Listado de Productos Vendidos</h1>";

						/* Se creará una simple tabla que mostrará todos los productos cargados y la opción de eliminarlos o modificarlos */
						$modificar1= $pdo->prepare("SELECT productos.id as prodid, productos.nombre as nombreprod, productos.marca, productos.modelo, productos.precio, productos.activo, venta.precio_venta, socios.nombre as nombrecliente, socios.apellido as apellidocliente, personales.nombre as nombreempleado, personales.apellido as apellidoempleado FROM productos WHERE activo = 0 JOIN socios ON venta.cliente_id=socios.id JOIN personales ON venta.cliente_id=personales.id ORDER BY id ASC;");
						$modificar1-> execute();
						$modificacion1 = $modificar1->fetchAll(PDO::FETCH_ASSOC);
						
						/* Mostramos los resultados en una tabla: */

						/* Encabezado de la tabla */
						echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
								<thead class="thead-dark" style="text-align:center";>
									<tr>
										<th>Numero</th>
										<th>Producto</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Precio</th>
										<th>Precio de venta</th>
										<th>Cliente</th>
										<th>Vendedor</th>
										<th>Devolver</th>
									</tr>
								</thead>';

							/* Cuerpo de la Tabla */
						foreach ($modificacion1 as $unaModificacion1) {
							echo '<tr>';
							echo '<td>'.$unaModificacion1['prodid'].'</td>';
							echo '<td>'.$unaModificacion1['nombreprod'].'</td>';
							echo '<td>'.$unaModificacion1['marca'].'</td>';
							echo '<td>'.$unaModificacion1['modelo'].'</td>';
							echo '<td>'.$unaModificacion1['precio'].'</td>';
							echo '<td>'.$unaModificacion1['precio_venta'].'</td>';
							echo '<td>'.$unaModificacion1['nombrecliente'].'</td>';
							echo '<td>'.$unaModificacion1['nombreempleado'].'</td>';

							/* Link para reactivar un producto */
							if($unaModificacion1['activo'] == 0) {
							echo '<td>
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modal_Devolucion'.$unaModificacion1['id'].'">
									  <i class="fas fa-backward"></i>
									</button>'; //Botón para Abrir el Modal

									//Acá genero un modal para cada elemento del foreach
									echo '<div class="modal fade" id="Modal_Devolucion'.$unaModificacion1['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="Modal_Devolucion">Devolver Producto</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">';

									      		/* Pregunto al Usuario si quiere vender el producto*/

									      		echo "¿Seguro que desea devolver el producto ".$unaModificacion1['nombre'].' '.$unaModificacion1['marca'].' '.$unaModificacion1['modelo']."?";

												//Conecto a la BD
									      	    $pdo = conectar();
	
												/* Preparamos la venta*/
												$productoD=$pdo->prepare("SELECT activo FROM productos WHERE id=:num");
												
												/* Se linkea el parámetro :num con el id que se recibe por GET */
												$productoD->bindValue(':num',$unaModificacion1['id']);

												/* Se ejecuta la preparacion */
												$productoD->execute();

												$info11 = $productoD->fetchAll(PDO::FETCH_ASSOC);

												/*Pie del Modal*/
												echo '<div class="modal-footer">';

												/* Se arma un simple formulario para ingresar la informacion nueva de los juegos */
												echo '<form action="noventa.php" method="post">'; 
												echo "<input name='id' type='hidden' value='{$unaModificacion1['id']}'>"; //Dirijo el ID
													echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, cerrar</button>
														<button type="submit" class="btn btn-info">	
														Si, devolver
														</button>
													</form>
											</div>'; /* /Cierre del pie del modal*/							
									 echo '</div>
									    </div>
									  </div>
									</div>
								  </td>
								</tr>';
							}
						}
						?>
						</table style="margin-bottom: 3rem;">

						<!-- Contenedor para los botones -->
						<div class="container">
							<!-- Posiciono en Fila -->
							<div class="row">
								<!-- Elijo la ubicación espacial de cada botón -->
								<div class="col-6">
									<!-- Link -->
									<a class="btn btn-info" href=../index.html><i class="fa fa-home"></i> Volver al inicio </a>
								</div>
								<!-- Elijo la ubicación espacial de cada botón -->
								<div class="col-6">

									<!-- Botón de Agregar -->
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
									  <i class="fa fa-plus"></i> Agregar un nuevo ítem
									</button>

									<!-- Modal (o ventana emergente) -->
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document"> <!-- Ventana -->
									    <div class="modal-content"> <!-- Contenido -->
									      <div class="modal-header">	<!-- Encabezado del Modal -->
									        <h5 class="modal-title" id="exampleModalLabel">Agregar un producto</h5> <!-- Titulo del Modal -->
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!-- Botón de Cierre del Modal -->
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body"> <!-- Cuerpo del Modal -->
									      	<?php
									      		//Conecto a la BD
										        $pdo=conectar();
									
												/* Se crea un formulario para agregar un nuevo juego, su genero y precio */
												echo "<form action='alta.php' method='post' id='form' name='form'>";
												echo "Nombre de producto <input name='nombre' type='text' required><br>";
												echo "Marca <input name='marca' type='text' required><br>";
												echo "Modelo <input name='modelo' type='text' required><br>";
												echo "Precio: <input name='precio' type='number' required><br>";
												echo '</div>
										      	<div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										        <button type="submit" class="btn btn-primary">Agregar Producto</button>';

												echo '</form>
												</div>';
											?>
									      </div> <!-- /Cierre del Body del Modal -->
									    </div> <!-- /Cierre del Contenido del Modal -->
									  </div> <!-- /Cierre del Modal Dialog -->
									</div> <!-- /Cierre del Modal -->
								</div> <!-- /Cierre de la columna -->
							</div> <!-- /Cierre de la fila -->
						</div> <!-- /Cierre del Contenedor -->
					</main> <!-- /Cierre del Contenido Principal -->

				<!-- Right Sidebar -->
				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
						</li>
					</ul>
				</div> <!-- /Cierre de la barra Derecha -->

			</div>

		</div>

	</body> 
	
</html>
