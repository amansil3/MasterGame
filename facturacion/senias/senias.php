<?php
require('../Conectar.php');
$pdo = conectar();
$consulta = $pdo->prepare("SELECT nro_seña, fecha, nombre, apellido, dni, telefono, producto, seña, valor, resto FROM señas");
$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo '<table border=1><tr>';
echo '<th>Número de Seña<th>Fecha<th>Nombre</th>';
echo '<th>Apellido<th>DNI</th>';
echo '<th>Telefono<th>Producto<th>Seña<th>Valor<th>Resto</th></tr>';
foreach ($resultado as $seña) {
    echo '<tr>';
    echo '<td>'.$seña['nro_seña'].'</td>';
	echo '<td>'.$seña['fecha'].'</td>';
    echo '<td>'.$seña['nombre'].'</td>';
	echo '<td>'.$seña['apellido'].'</td>';
	echo '<td>'.$seña['dni'].'</td>';
	echo '<td>'.$seña['telefono'].'</td>';
	echo '<td>'.$seña['producto'].'</td>';
	echo '<td>'.$seña['seña'].'</td>';
	echo '<td>'.$seña['valor'].'</td>';
	if ($seña['resto'] === 0){
		echo '<td>CANCELADA</td>';
	}
	else{
		echo '<td>'.$seña['resto'].'</td>';	
	}	
    echo '<td><a href="verseña.php?id='.$seña['nro_seña'].'">Ver seña</a></td>';
	echo '<td><a href="bajaseña.php?id='.$seña['nro_seña'].'">Borrar</a></td>';
    echo '<td><a href="modificarseña.php?id='.$seña['nro_seña'].'">Modificar</a></td>';
    echo '</tr>';
}
echo '</table>';
echo '<br><a href=../index.html>Volver al menu</a>';
?>