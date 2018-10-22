<link rel="stylesheet" href="estilo.css">
<?php
	include('funciones.php');
	
	$pdo = conectar();

	/* Preparamos la eliminacion */

	$eliminar=$pdo->prepare("DELETE FROM productos WHERE id=:num");

	/* Vinculamos el parámetro :num con el id que se obtiene por GET */
	
	$eliminar->bindValue(':num',$_GET['id']);

	/* Ejecutamos la eliminación, mostrando un mensaje de éxito o error según corresponda */
	if($eliminar->execute()) {
		/* Si es exitosa la eliminacion */
		echo "Producto eliminado correctamente";
	}
	else {
		/* Cualquier error que suceda */
		echo "Error al querer eliminar el producto";
	}
	echo '<center><a href=index.html>Volver al inicio</a></center>';
?>