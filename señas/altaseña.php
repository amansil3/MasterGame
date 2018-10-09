<?php
include('funciones.php');
$fecha= date("Y-m-d H:i:s");
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$producto = $_POST['producto'];
$seña = $_POST['seña'];
$valor = $_POST['valor'];
$resto = $valor - $seña;
$pdo = conectar();
$insercion = $pdo -> prepare("INSERT INTO señas (fecha, nombre, apellido, dni, telefono, producto, seña, valor, resto) VALUES (:f, :e, :d, :c, :b, :a, :y, :z, :w);");
$insercion -> bindValue(':f',$fecha);
$insercion -> bindValue(':e',$nombre);
$insercion -> bindValue(':d',$apellido);
$insercion -> bindValue(':c',$dni);
$insercion -> bindValue(':b',$telefono);
$insercion -> bindValue(':a',$producto);
$insercion -> bindValue(':y',$seña);
$insercion -> bindValue(':z',$valor);
$insercion -> bindValue(':w',$resto);
if ($insercion -> execute()) {
    echo "La seña fue agregada<br><a href=crearseña.html>Crear otra seña</a><br><a href=señas.php>Ver señas</a><br><a href=../index.html>Volver al Menu</a>";
}
else {
    echo "Error al agregar la seña<br><a href=crearseña.html>Volver a intentarlo</a><br><a href=señas.php>Ver señas</a><br><a href=../index.html>Volver al Menu</a>";
}
?>