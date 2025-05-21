<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clientes_nuevo.php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
		<h2><?php echo $data["titulo"]; ?></h2>
            <!--El atributo autocomplete="off" en HTML se usa en formularios o campos de entrada (<input>) 
            para desactivar la función de autocompletado del navegador. Cuando se establece este atributo 
            en un campo de formulario, el navegador no sugiere valores almacenados previamente para ese 
            campo específico.   -->
        <form id="nuevo" name="nuevo" method="POST" action="crud.php?c=cliente&a=guarda" autocomplete="off">
            
            <div class="form-group">
                <label for="placa">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" />
            </div>
                        
            <div class="form-group">
                <label for="marca">Sector:</label>
                <input type="text" class="form-control" id="sector" name="sector" />
            </div>
                        
            <div class="form-group">
                <label for="modelo">Telefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" />
            </div>
                    
            <div class="form-group">
                <label for="anio">Correo:</label>
                <input type="text" class="form-control" id="correo" name="correo_c" />
            </div>
                        
            <div class="form-group">
                <label for="color">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" />
            </div>
		
            <button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
				
        </form>
    </div>
</body>
</html>