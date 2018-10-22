<link rel="stylesheet" href="estilo.css">
<?php
	include('funciones.php');
	$pdo = conectar();
	
	/* Se prepara la modificación */
	
	$modificacion=$pdo->prepare("UPDATE productos SET nombre = :nombre WHERE id = :num");
	$modprecio=$pdo->prepare("UPDATE productos set precio = :precio WHERE id = :num");
	/* Se vinculan los parámetros con los datos que se reciben por POST: */
	
	$modificacion->bindValue(':nombre',$_POST['nombre']);
	$modificacion->bindValue(':num',$_POST['id']);
	$modprecio->bindValue(':precio',$_POST['precio']);
	$modprecio->bindValue(':num',$_POST['id']);
	/* Se ejecuta la modificación preparada anterior */
	
	if($modificacion ->execute()) {
		try {
			$modprecio->execute();
			echo "Exito ! El producto fue modificado";
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
		/*	
		if($modprecio->execute()){
		Si es exitosa 
			echo "Exito ! El juego fue modificado";
		}
		else { 
			echo "Error ! No se pudo cambiar la información de los precios";
		}*/
	}
	else {
		/* Si sucedió algún error */
		echo "Error ! No se pudo cambiar la información de los juegos";
	}
	echo '<center><a href=index.html>Volver al inicio</a></center>';
?>