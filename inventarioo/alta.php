<link rel="stylesheet" href="estilo.css">
<?php
	include('../Conectar.php');
	//$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	
	$pdo = conectar();

	/* Se preparan las sentencias con los valores deseados */
	
	$agregar=$pdo->prepare("INSERT INTO productos (nombre, precio) VALUES (:nom, :pre);");
	//$agregarprecio=$pdo->prepare("INSERT INTO productos (id,precio) VALUES (:numjue, :pre);");
	
	/* Se le asigna valores a la primer sentencia */
	
	$agregar->bindValue(':nom', $nombre);
	$agregar->bindValue(':pre', $precio);

	/* Se ejecuta lo preparado anteriormente, y se agrega un nuevo juego: */
	
	if (!$agregar -> execute()) {
		//Si la ejecución de agregar un juego no salió exitosa:		
		echo "Error al agregar el juego";
		die();
		}
	else {
		header("Location: nuevo.php");
	}

?>