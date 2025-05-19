<?php
/*iniciarSesion.php*/
    session_start();

    include_once('../Config/Conexion.php');

    if(isset($_POST['Usuario']) && isset($_POST['Clave'])){
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $usuario = validate($_POST['Usuario']);
        $clave = validate($_POST['Clave']);

        if(empty($usuario) && empty($clave)){
            header("location: ../iniciarsesion.php?error=El usuario y la clave son requeridas");
            exit();
        }elseif(empty($clave)){
            header("location: ../iniciarsesion.php?error=La clave es requerida");
            exit();            
        }elseif(empty($usuario)){
            header("location: ../iniciarsesion.php?error=El usuario es requerido");
            exit();            
        }else{
            /*$clave = password_hash($clave, PASSWORD_BCRYPT);*/

            $sql = "SELECT * FROM usuario WHERE user = '$usuario' AND clave = '$clave'";
            $query = $con->query($sql);

            if(mysqli_num_rows($query) === 1){
                $row = mysqli_fetch_assoc($query);

                if($row['user'] === $usuario && $row['clave'] === $clave){
                    $_SESSION['user'] = $row['user'];
                    $_SESSION['nombre_completo'] = $row['nombre_completo'];
                    $_SESSION['correo'] = $row['correo'];
                    header("location: ../inde.php");
                    exit();
                }else{
                    header("location: ../iniciarsesion.php?error=El usuario o la clave son incorrectas");
                    exit();
                }
            }else{
                header("location: ../iniciarsesion.php?error=El usuario o clave son inexistentes");
                exit();
            }
        }
    }else{
        header("location: ../iniciarsesion.php");
        exit();
    }
?>