<?php
require('funciones.php');
$pdo = conectar();
$consulta=$pdo->prepare("SELECT nro_seña, fecha, nombre, apellido, dni, telefono, producto, seña, valor FROM señas WHERE nro_seña=:nro_seña");
$consulta->bindValue(':nro_seña',$_GET['id']);
$consulta->execute();
$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo '<form action="guardarmodif.php" method="post">';
echo "<input name='nro_seña' type='hidden' value='{$_GET['id']}'>";
echo "Nombre: <input name='nombre' value='{$datos[0]['nombre']}'><br>";
echo "Apellido: <input name='apellido' value='{$datos[0]['apellido']}'><br>";
echo "DNI: <input name='dni' value='{$datos[0]['dni']}'><br>";
echo "Telefono: <input name='telefono' value='{$datos[0]['telefono']}'><br>";
echo "Producto: <input name='producto' value='{$datos[0]['producto']}'><br>";
echo "Seña: <input name='seña' value='{$datos[0]['producto']}'><br>";
echo "Valor: <input name='valor' value='{$datos[0]['valor']}'><br>";
echo '<input type="submit" value="Modificar datos">';
echo '</form>';
?>