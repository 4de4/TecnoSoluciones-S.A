<?php 
/*Login/Registrarse.php*/
    session_start();

    include_once('../Config/Conexion.php');
    if(isset($_POST['Usuario']) && isset($_POST['NombreCompleto']) && isset($_POST['Correo']) && isset($_POST['Clave']) && isset($_POST['RClave'])){
        function validar($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $usuario = validar($_POST['Usuario']);
        $nombreCompleto = validar($_POST['NombreCompleto']);
        $correo = validar($_POST['Correo']);
        $clave = validar($_POST['Clave']);
        $Rclave = validar($_POST['RClave']);

        $datosUsuario = 'Usuario=' . $usuario . '&NombreCompleto' . $nombreCompleto;

        if(empty($usuario)){
            header("location: ../registrarse.php?error=El usuario es requerido&$datosUsuario");
            exit();
        }elseif(empty($nombreCompleto)){
            header("location: ../registrarse.php?error=El nombre completo es requerido&$datosUsuario");
            exit();
        }elseif(empty($correo)){
            header("location: ../registrarse.php?error=El correo es requerido&$datosUsuario");
            exit();
        }elseif(empty($clave)){
            header("location: ../registrarse.php?error=La clave es requerida&$datosUsuario");
            exit();
        }elseif(empty($Rclave)){
            header("location: ../registrarse.php?error=Repetir la clave es requerida&$datosUsuario");
            exit();
        }elseif($clave !== $Rclave){
            header("location: ../registrarse.php?error=Las claves no coinciden");
            exit();
        }else{
            /*$clave = password_hash($clave, PASSWORD_BCRYPT);*/

            $sql = "SELECT * FROM usuario WHERE user = '$usuario'";
            $query = $con->query($sql);

            if(mysqli_num_rows($query) > 0){
               header("location: ../registrarse.php?error=El usuario ya existe!");
               exit(); 
            }else{
                $sql2 = "INSERT INTO usuario (user, nombre_completo, correo, clave) VALUES ('$usuario','$nombreCompleto','$correo','$clave')";
                $query2 = $con->query($sql2);

                if($query2){
                    header("location: ../registrarse.php?success=Usuario creado con exito!");
                    exit();
                }else{
                    header("location: ../registrarse.php?success=Ocurrio un error...:(");
                    exit();
                }
            }
        }
    }else{
        header('location: ../registrarse.php');
        exit();
    }

?>