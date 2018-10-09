<?php	
		require('funciones.php');
		$pdo = conectar();	
		$consulta=$pdo->prepare("SELECT nro_remito, fecha, nombre, apellido, dni, telefono, producto, garantia, valor FROM remitos WHERE nro_remito=:nro_remito");
		$consulta->bindValue(':nro_remito',$_GET['id']);
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		foreach ($datos as $info){
		$nro_remito = $info['nro_remito'];
		$fecha = $info['fecha'];
		$nombre = $info['nombre'];
		$apellido = $info['apellido'];
		$dni = $info['dni'];
		$telefono = $info['telefono'];
		$producto = $info['producto'];
		$garantia = $info['garantia'];
		$valor = $info['valor'];
		}
		$listaprod = explode (";", $producto);
		$listag = explode (";", $garantia);
		$listaval = explode (";", $valor);
		$sum=0;
		$sum2=0;
		echo "
		<html>
		<head>
		<link rel=stylesheet type=text/css href=estilo.css>
		<title>
		Remito n°$nro_remito
		</title>
		</head>
		<table border=3 width=100%>
		<tr>
			<td>
				<h1>MASTER GAME</h1>
				De Emanuel Bruno Dalli
				<br>Domicilio: Cordoba 959
				<br>Rosario, Santa Fe, Argentina
				<br>Telefono: +543416527513
				<br><br>RESPONSABLE INSCRIPTO
			</td>
			<td>
				<h1>REMITO</h1>
				(Comprobante no válido como factura)
				<br>Fecha y hora de venta: $fecha
				<br>N°de Remito: $nro_remito
				<br>CUIL: 20-33213722-4
				<br>Ingresos Brutos:
				<br>Inicio de actividades:
			</td>	
		</tr>
		</table>
		<table border=3 width=100%>
		<tr>
			<td>
				<center><h1>INFORMACIÓN DEL CLIENTE</h1></center>
			</td>
		</tr>
		<tr>
			<td>
				Apellido y Nombre: $apellido, $nombre<br>
				Número de Documento: $dni<br>
				Telefono: $telefono<br>
			</td>
		</tr>
		</table>
		<table border=3 width=100%>
		<tr>
			<td>
				<center><h1>PRODUCTOS</h1></center>
			</td>
		</tr>
		</table>
		<table border=3 width=100% height=400px>
		<tr>
			<td>
				Descripción del producto
			</td>
			<td>
				Garantía del producto
			</td>
			<td>
				Valor del producto
			</td>
		</tr>
		<tr>	
			<td>";
				foreach ($listaprod as $l) {
					echo "$l <br>";
				}	
	echo "	</td>
			<td>";
				foreach ($listag as $l0) {
					echo "$l0 <br>";
				}	
	echo "	</td>
			<td>";
				foreach ($listaval as $l2) {
					echo "$$l2 <br>";
					$sum2= $sum2 + $l2;
				}	
	echo "	</td>	
		</tr>
		<tr>
			<td>
				
			</td>
			<td>
				Monto Final:
			</td>
			<td>
				$$sum2
			</td>
		</tr>		
	</table></body></html>
	";
echo "<br>";	
echo "<button id='printPageButton' onClick='window.print();'>Imprimir remito</button><br><br>";
echo "<form action=remitos.php>
		<button id='printPageButton2'>Volver a remitos</button>
	  </form>"	
?>
    