<?php
	function conectar() {
    $servidor =  'localhost';
    $nombreBD = 'mastergame';
    $usuario = 'root';
    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$nombreBD;charset=utf8", $usuario);
        return $pdo;
    }
    catch (PDOException $e) {
        echo "¡Error!" . $e->getMessage() . "<br>";
    }
}
?>
		