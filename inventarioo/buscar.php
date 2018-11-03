<?php
    require ('../Conectar.php');
    $pdo=conectar();

    $salida = "";

    $query = $pdo->prepare("SELECT * FROM productos WHERE nombre NOT LIKE '' ORDER By id LIMIT 100");

    if (isset($_POST['consulta'])) {
    	$q = $_POST['consulta'];
    	$query = $pdo->prepare("SELECT * FROM productos WHERE id LIKE '%$q%' OR nombre LIKE '%$q%' OR marca LIKE '%$q%' OR modelo LIKE '%$q%' OR precio LIKE '$q' ");
    }   

    $query -> execute();
    $contar =  $query->rowCount();

    if ($contar>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>ID</td>
    					<td>Nombre</td>
    					<td>Marca</td>
    					<td>Modelo</td>
    					<td>Precio</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

        foreach ($query as $fila) {
    		$salida.="<tr>
                        <td>".$fila['id']."</td>
    					<td>".$fila['nombre']."</td>
                        <td>".$fila['marca']."</td>
                        <td>".$fila['modelo']."</td>
                        <td>".$fila['precio']."</td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }

    echo $salida;

    $pdo=null;
?>