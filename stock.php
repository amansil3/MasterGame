<!DOCTYPE html>
<html>
	<head>
	
	<!-- Load js files -->
	<script src="/mastergay/jquery/jquery-3.2.1.min.js"></script>
	<script src="/mastergay/js/bootstrap.bundle.js"></script>

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
		    <a class="navbar-brand" href="#"  style="color: #fff;">
			    Sistema de Logística
			</a>
			<div class="nav navbar-nav navbar-right">
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav mr-auto">
			    		<li class="nav-item active">
			    			<a class="nav-link" href="index.html" style="margin-right: 1rem; color: #fff;">Inicio <span class="sr-only">(current)</span></a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="FichasEmpleados.php" style="color: #fff;">Personal</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="FichasEmpleados.php" style="color: #fff;">Proveedores</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="crud.php" style="color: #fff;">Clientes</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="stock.php" style="color: #fff;">Gestionar Stock</a>
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
			// Tipo de vehiculo
			abstract class Vehicle
			{
				public function show($message)
				{
					echo "<p>$message</p>";
				}

				private $brand;
				private $model;
				private $color;
				private $km;
					
				public function setBrand($brand)
				{
					$this->brand = $brand;
				}

				public function setModel ($model)
				{
					$this->model = $model;
				}

				public function setColor($color)
				{
					$this->color = $color;
				}

				public function setKM($km)
				{
					$this->km = $km;
				}

				public function getBrand()
				{
					return $this->brand;
				}

				public function getModel()
				{
					return $this->model;
				}

				public function getColor()
				{
					return $this->color;
				}

				public function getKm()
				{
					return $this->km;
				}

				public function checkEngine()
				{
					return $this->show($this->brand .": Verifique Motor.");
				}

				public function checkFuel()
				{
					return $this->show($this->brand.": Poco Combustible.");
				}
			}

			class Car extends Vehicle
					{	
						private $door;

						public function __construct($brand,$model,$door,$color,$km,$year)
						{
							$this->setBrand($brand);
							$this->setModel($model);
							$this->setColor($color);
							$this->setKm($km);
							$this->door = $door;
							$this->year = $year;
						}

						public function showProperties()
						{
							return parent::show(
								"Marca: ".$this->getBrand()."<br>".
								"Modelo: ".$this->getModel()."<br>".
								"Color: ".$this->getColor()."<br>".
								"Kilometraje: ".$this->getKm()."<br>".
								"Puertas: ".$this->door."<br>"
							);
						}
						public function getDoor()
						{
							return $this->door;
						}
						public function getYear()
						{
							return $this->year;
						}
					}

		$auto1 = new Car('Toyota', 'Corolla', 4, 'Rojo', 100000, 2010);
		$auto2 = new Car('Chevrolet', 'Corsa Classic', 4,'Verde', 40000, 2012);
		$auto3 = new Car('Ford', 'Ka', 5, 'Blanco', 45000,2008);
		$id=0;
		for ($i=0; $i <$id ; $i++) { 
			$id=$id+1;
			}
		echo '<h1 class="display-5" align="center"> Tabla de Juegos en Stock </h1>
			  <div class = "container" style = "padding-top: 1em"
				<div class = "table responsive">
					<label id="searchLabel">
					Search:
					<input class="form-control form-control-sm placeholder"" aria-controls="dtBasicExample" type="search">
					</label>
					<label>
					<select class="custom-select custom-select-sm form-control form-control-sm" name="dtBasicExample_length" aria-controls="dtBasicExample">
						<option value="1"> 10 </option>
						<option value="2"> 20 </option>
						<option value="3"> 30 </option>
						<option value="4"> 40 </option>
					</select>
					</label>
					<table class="table table-hover table-bordered table-striped id="myTable">
						<thead class=thead-dark>
							<tr>
								<th scope="col"> ID </th>
								<th scope="col"> Marca </th>
								<th scope="col"> Modelo	</th>
								<th scope="col"> Color	</th>
								<th scope="col"> Kilometraje </th>
								<th scope="col"> Puertas </th>
								<th scope="col"> Año </th>
								<th scope="col"> Imagen </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope=row> 1 </th>
								<td>
									'.$auto1->getBrand()."
								</td>
								<td>
									".$auto1->getModel()."
								</td>
								<td>
									".$auto1->getColor()."
								</td>
								<td>
									".$auto1->getKm()."
								</td>
								<td>
									".$auto1->getDoor().'
								</td>
								<td>
									'.$auto1->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Mostrar Imagen	</button>
									<div id="myModal" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title">'.$auto1->getBrand()." ".$auto1->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto1" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corolla.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corolla1.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corolla2.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto1" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto1" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 3 </th>
								<td>
									'.$auto3->getBrand()."
								</td>
								<td>
									".$auto3->getModel()."
								</td>
								<td>
									".$auto3->getColor()."
								</td>
								<td>
									".$auto3->getKm()."
								</td>
								<td>
									".$auto3->getDoor().'
								</td>
								<td>
									'.$auto3->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">Mostrar Imagen</button>
									<div id="myModal2" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title">'.$auto3->getBrand()." ".$auto3->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto3" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/fordka.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/fordka1.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/fordka2.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto3" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto3" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th scope=row> 2 </th>
								<td>
									'.$auto2->getBrand()."
								</td>
								<td>
									".$auto2->getModel()."
								</td>
								<td>
									".$auto2->getColor()."
								</td>
								<td>
									".$auto2->getKm()."
								</td>
								<td>
									".$auto2->getDoor().'
								</td>
								<td>
									'.$auto2->getYear().'
								</td>
								<td>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Mostrar Imagen</button>
									<div id="myModal1" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title" align=center>'.$auto2->getBrand()." ".$auto2->getModel().'</h4>
									      </div>
									      <div class="modal-body">
											<div id="carouselauto2" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="First slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Second slide">
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="/object/images/corsa.jpg" alt="Third slide">
											    </div>
											  </div>
											  <a class="carousel-control-prev" href="#carouselauto2" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselauto2" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="container" align="right" style"padding-top=12em">
				<h5 class="card-title"></h5>
				<p class="card-text"></p>
				<a href="/object/index.php" class="btn btn-primary btn-sm">Volver al Inicio</a>
			</div>';
		?>
		<!--<form class="form-inline"> </form>-->
		
	</body>
</html>