<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container">			
			<h2><?php echo $data["titulo"]; ?></h2>			
			<form id="nuevo" name="nuevo" method="POST" action="crud.php?c=cliente&a=actualizar" autocomplete="off">		
				<input type="hidden" id="id_c" name="id_c" value="<?php echo $data["id_c"]; ?>" />				
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data["cliente"]["nombre"]?>" />
				</div>				
				<div class="form-group">
					<label for="sector">Sector:</label>
					<input type="text" class="form-control" id="sector" name="sector" value="<?php echo $data["cliente"]["sector"]?>" />
				</div>
				
				<div class="form-group">
					<label for="telefono">Telefono:</label>
					<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $data["cliente"]["telefono"]?>" />
				</div>				
				<div class="form-group">
					<label for="correo_c">Correo:</label>
					<input type="text" class="form-control" id="correo_c" name="correo_c" value="<?php echo $data["cliente"]["correo_c"]?>" />
				</div>
				
				<div class="form-group">
					<label for="direccion">Direccion:</label>
					<input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $data["cliente"]["direccion"]?>" />
				</div>
				
				<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
				
			</form>
    </div>
</body>
</html>