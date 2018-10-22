<?php
	function conectar() {
		/*Información del servidor*/
		$servidor =  '127.0.0.1';
		$nombreBD = 'inventario';
		$usuario = 'root';
		$clave = '';
		try {
			/*Creamos un nuevo objeto de la clase PDO que es guardado en $pdo.*/
			$pdo = new PDO("mysql:host=$servidor;dbname=$nombreBD;charset=utf8", $usuario, $clave);
			/*Devolvemos el $pdo.*/
			return $pdo;
		}
    catch (PDOException $error) {
        /*Si falló la conexión de la prueba, se lanza un mensaje de error.*/
        echo "ERROR DE CONEXIÓN<br><br>" . $error->getMessage() . "<br>";
    }
}
?>