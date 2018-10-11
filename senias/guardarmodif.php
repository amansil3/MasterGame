<?php
require('funciones.php');
$pdo = conectar();
$modificacion=$pdo->prepare("UPDATE señas SET
                                nombre = :nombre, apellido = :apellido, dni = :dni, telefono = :telefono, producto = :producto, seña = :seña, valor = :valor
                                WHERE nro_seña=:nro_seña");
$modificacion->bindValue(':nro_seña',$_POST['nro_seña']);
$modificacion->bindValue(':nombre',$_POST['nombre']);
$modificacion->bindValue(':apellido',$_POST['apellido']);
$modificacion->bindValue(':dni',$_POST['dni']);
$modificacion->bindValue(':telefono',$_POST['telefono']);
$modificacion->bindValue(':producto',$_POST['producto']);
$modificacion->bindValue(':seña',$_POST['seña']);
$modificacion->bindValue(':valor',$_POST['valor']);
if($modificacion->execute()) {
    echo "Datos modificados correctamente<br><a href=remitos.php>Volver a remitos</a>";
}
else {
    echo "Error al modificar los datos del remito";
}
?>