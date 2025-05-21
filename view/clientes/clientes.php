<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crud.css?v=3">
    <title>clientes..php</title>
</head>
<body>
    <center>
    <h2><?php echo $data["titulo"]; ?></h2>			
				
	<br>
	<br>
    
	<table border="1" class="tablecliente">
        <thead>
            <tr>
                <th class="cab">Nombre</th>
                <th class="cab">Sector</th>
                <th class="cab">Telefono</th>
                <th class="cab">Correo</th>
                <th class="cab">Direccion</th>
                <th class="cab">Editar</th>
                <th class="cab">Eliminar</th>
            </tr>
        </thead>					
        <tbody>
            <div class="contenido">
            <?php 
                foreach($data["cliente"] as $dato) {
                    echo "<tr>";
                    echo "<td class='text'>".$dato["nombre"]."</td>";
                    echo "<td class='text'>".$dato["sector"]."</td>";
                    echo "<td class='text'>".$dato["telefono"]."</td>";
                    echo "<td class='text'>".$dato["correo_c"]."</td>";
                    echo "<td class='text'>".$dato["direccion"]."</td>";
                    echo "<td class='btn'><a href='crud.php?c=cliente&a=modificar&id=".$dato["id_c"]."' class='btn btn-warning'>Modificar</a></td>";
	                echo "<td class='btn'><a href='crud.php?c=cliente&a=eliminar&id=".$dato["id_c"]."' class='btn btn-danger'>Eliminar</a></td>";
	                echo "</tr>";
                }
                echo "<tr>
                    <td colspan='7'><a href='crud.php?c=cliente&a=nuevo'>Agregar</a></td>
                    </tr>";
            ?>
            </div>
        </tbody>					
	</table>
    </center>
</body>
</html>