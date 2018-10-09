<?php
require('funciones.php');
$pdo = conectar();
$eliminacion=$pdo->prepare("DELETE FROM señas WHERE nro_seña=:nro_seña");
$eliminacion->bindValue(':nro_seña',$_GET['id']);
if($eliminacion->execute()) {
    echo "Seña eliminada correctamente
	<br><a href=señas.php>Volver a señas</a>
	<br><a href=../index.html>Volver al menu</a>";
}
else {
    echo "Error al eliminar la seña
	<br><a href=señas.php>Intentar nuevamente</a>
	<br><a href=../index.html>Volver al menu</a>";
}
?>