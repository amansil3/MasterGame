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
			    			<a class="nav-link" href="../proveedores/FichasEmpleados.php" style="color: #fff;">Proveedores</a>
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

						$modificar= $pdo->prepare("SELECT id, nombre, precio, activo FROM productos ORDER BY id ASC;");
						$modificar-> execute();
						$modificacion = $modificar->fetchAll(PDO::FETCH_ASSOC);
						
						/* Mostramos los resultados en una tabla: */
						
						echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
								<thead class="thead-dark" style="text-align:center";>
									<tr>
										<th>Numero</th>
										<th>Producto</th>
										<th>Precio</th>
										<th>Baja</th>
										<th>Modificación</th>
									</tr>
								</thead>';
						foreach ($modificacion as $unaModificacion) {
							echo '<tr>';
							echo '<td>'.$unaModificacion['id'].'</td>';
							echo '<td>'.$unaModificacion['nombre'].'</td>';
							echo '<td>'.$unaModificacion['precio'].'</td>';

							/* Link para eliminar un juego */
							if($unaModificacion['activo'] == 1) {
							
							/* Modal */
							echo '<td>
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal'.$unaModificacion['id'].'">
									  <i class="fa fa-edit"></i>
									</button>';

									//Acá genero un modal para cada elemento del foreach
									echo '<div class="modal fade" id="exampleModal'.$unaModificacion['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel1">Borrar Producto</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">';

									      echo "Desea borrar el producto ".$unaModificacion['nombre']."?";
									      
									      $pdo = conectar();

											/* Preparamos la eliminacion */
											$eliminar=$pdo->prepare("DELETE FROM productos WHERE id=:num");

											/* Vinculamos el parámetro :num con el id que se obtiene por GET */
											$eliminar->bindValue(':num',$unaModificacion['id']);

										echo '<div class="modal-footer">';
												echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, cerrar</button>
												<a class="btn btn-danger" href="baja.php?id='.$unaModificacion['id'].'">
												Borrar
											</a>
										</div>
									  </td>';
							}
							else {
								echo '<td>NO</td>';
							}

							/* Link para modificar un juego */

							/* Modal */
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
												$productoactual=$pdo->prepare("SELECT nombre, precio FROM productos WHERE id=:num");
												
												/* Se linkea el parámetro :num con el id que se recibe por GET */
												$productoactual->bindValue(':num',$unaModificacion['id']);

												/* Se ejecuta la preparacion */
												$productoactual->execute();

												$info = $productoactual->fetchAll(PDO::FETCH_ASSOC);

												/* Se arma un simple formulario para ingresar la informacion nueva de los juegos */
												
												echo '<form action="prodmodificado.php" method="post">';
												echo "<input name='id' type='hidden' value='{$unaModificacion['id']}'>";
												echo "Nombre del producto: <input name='nombre' value='{$info[0]['nombre']}'><br>";
												echo '</select><br>';
												echo "Precio: <input type='number' name='precio' value='{$info[0]['precio']}'>";
												echo '<div class="modal-footer">';
												echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
												echo '<button type="submit" class="btn btn-primary">Modificar producto</button>';
												echo '</form>
												</div>										
									      </div>
									    </div>
									  </div>
									</div>

								  </td>
								</tr>';
						}
						?>
						</table>
				
						<a class="btn btn-info" href=../index.html style="margin: 1rem 0rem 0rem 0rem;">Volver al inicio</a>
					</main>

				<!-- Right Sidebar -->

				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">

						<li class="toc-entry toc-h2">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
							  <i class="fa fa-plus" style="margin-right: 0.2rem;"></i> Agregar un nuevo ítem
							</button>

							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Agregar un producto</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<?php
								        $pdo=conectar();
							
										/* Se crea un formulario para agregar un nuevo juego, su genero y precio */
										
										echo "<form action='alta.php' method='post' id='form' name='form'>";
										echo "Nombre de producto <input name='nombre' type='text'>";
										echo "<span id='advertencia' style='color:red'></span><br>";	
										echo "<br>";
										echo "Precio: <input name='precio' type='text'><br>";
										echo '</div>
								      	<div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								        <button type="submit" class="btn btn-primary">Agregar Producto</button>';

										echo '</form>
										</div>';
									?>
							      </div>
							    </div>
							  </div>
							</div>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</body> 
	
	<script type="text/javascript"> 
		function pupo(item){
			console.log(item)
		}
	</script>
</html>
