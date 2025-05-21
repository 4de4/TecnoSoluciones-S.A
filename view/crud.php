<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crud.css?v=3">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "../config/define.php";
        require_once "../core/routes.php";
        require_once "../config/databas.php";
        require_once "../controllers/ClienteController.php";
        //La función isset en PHP es una herramienta útil para verificar si una 
            //variable existe y no es NULL.
            // c significa el controlador y a significa la accion que realiza el usuario
            // c y a trabajan juntos.
        if(isset($_GET['c'])){//si existe el parametro "c"(controlador) 
                // El método cargarControlador esta en el archivo routes.php
                $controlador = cargarControlador($_GET['c']);//se crea el controlador
                if(isset($_GET['a'])){//si existe a(accion) se verifica si tiene id
                    if(isset($_GET['id'])){
                        cargarAccion($controlador, $_GET['a'], $_GET['id']); //para modificar o eliminar
                    }else{//existe "id" cargara la accion
                        cargarAccion($controlador, $_GET['a']); //para nuevo
                    }
                }else{
                    cargarAccion($controlador, ACCION_PRINCIPAL);
                }		
        }else{//sino se tiene c en la url se ejecuta el index		
            $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
            $accionTmp = ACCION_PRINCIPAL;
            $controlador->$accionTmp();
        }

    ?>
</body>
</html>