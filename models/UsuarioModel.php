<?php
    class Usuario{
        private $guardar;
        private $db;
        
        public function __construct(){
            $this->guardar=array();
            $this->db=new PDO('mysql:host=localhost; dbname=tecnosoluciones', "root", "");
        }	

        public function Login($usuario, $clave){
            $sql = "SELECT * from usuario WHERE user = '$usuario' AND clave = '$clave'";
            $f = $this->db->query($sql);
            $this->guardar=$f->fetch(PDO::FETCH_ASSOC);
            return $this->guardar;
        }
    }
?>