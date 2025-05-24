<?php
/*iniciarSesion.php*/
session_start();
class UsuarioController
{
    public function __construct()
    {
        require_once('../models/UsuarioModel.php');
    }

    function iniciar()
    {
        if (isset($_POST['Usuario']) && isset($_POST['Clave'])) {
            function validate($data)
            {
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);

                return $data;
            }

            $usuario = validate($_POST['Usuario']);
            $clave = validate($_POST['Clave']);

            if (empty($usuario)) {
                header("location: ../view/iniciarsesion.php?error=El usuario es requerido");
                exit();
            } elseif (empty($clave)) {
                header("location: ../view/iniciarsesion.php?error=La clave es requerida");
                exit();
            } else {
                /*$clave = password_hash($clave, PASSWORD_BCRYPT);

            $sql = "SELECT * FROM usuario WHERE user = '$usuario' AND clave = '$clave'";
            $query = $con->query($sql);*/

                $guardar = new Usuario();
                $row = $guardar->Login($usuario);
                if ($row) {
                    if ($row['clave'] === $clave) {
                        $_SESSION['user'] = $row['user'];
                        $_SESSION['nombre_completo'] = $row['nombre_completo'];
                        $_SESSION['correo'] = $row['correo'];

                        header("location: ../view/crud.php");
                        exit();
                    } else {
                        header("location: ../view/iniciarsesion.php?error=La clave es incorrecta");
                        exit();
                    }
                } else {
                    header("location: ../view/iniciarsesion.php?error=El usuario o clave son inexistentes");
                    exit();
                }
            }
        } else {
            header("location: ../view/iniciarsesion.php");
            exit();
        }
    }

    function registrarse(){
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
            header("location: ../view/registrarse.php?error=El usuario es requerido&$datosUsuario");
            exit();
        }elseif(empty($nombreCompleto)){
            header("location: ../view/registrarse.php?error=El nombre completo es requerido&$datosUsuario");
            exit();
        }elseif(empty($correo)){
            header("location: ../view/registrarse.php?error=El correo es requerido&$datosUsuario");
            exit();
        }elseif(empty($clave)){
            header("location: ../view/registrarse.php?error=La clave es requerida&$datosUsuario");
            exit();
        }elseif(empty($Rclave)){
            header("location: ../view/registrarse.php?error=Repetir la clave es requerida&$datosUsuario");
            exit();
        }elseif($clave !== $Rclave){
            header("location: ../view/registrarse.php?error=Las claves no coinciden");
            exit();
        }else{
            /*$clave = password_hash($clave, PASSWORD_BCRYPT);*/

            $prueba = new Usuario();
            $a = $prueba->Login($usuario);

            if($a['user']===$usuario){
               header("location: ../view/registrarse.php?error=El usuario ya existe!");
               exit(); 
            }else{
                $guardar = new Usuario();
                $confirmar = $guardar->Registrar($usuario,$nombreCompleto,$correo,$clave);

                if($confirmar){
                    header("location: ../view/iniciarsesion.php?error=Usuario creado con exito!");
                    exit();
                }else{
                    header("location: ../view/registrarse.php?success=Ocurrio un error...:(");
                    exit();
                }
            }
        }
    }else{
        header('location: ../view/registrarse.php');
        exit();
    }
    }
}
