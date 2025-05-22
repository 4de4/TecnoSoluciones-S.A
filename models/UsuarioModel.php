<?php
    class Usuario{
        private $guardar;
        private $db;
        
        public function __construct(){
            $this->guardar=array();
            $this->db=new PDO('mysql:host=localhost; dbname=tecnosoluciones', "root", "");
        }	

        public function Login($usuario){
            $sql = "SELECT * from usuario WHERE user = '$usuario'";
            $f = $this->db->query($sql);
            $this->guardar=$f->fetch(PDO::FETCH_ASSOC);
            $this->db=null;
            return $this->guardar;
        }

        public function Registrar($usuario,$nombreCompleto,$correo,$clave){
            $sql = "INSERT INTO usuario (user, nombre_completo, correo, clave) VALUES ('$usuario','$nombreCompleto','$correo','$clave')";
            $resultado = $this->db->query($sql);
            if($resultado){
                return true;
            }else{
                return false;
            }
            $this->db=null;

        }
    }
?>