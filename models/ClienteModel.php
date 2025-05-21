<?php
class Cliente_model {		
    //definir atributos:
    private $db;
    private $cliente;		
    public function __construct(){
	//usando atributo db para trabajar con el método conexión 
        //que esta en la carpeta config/database.php
    $this->db = Conectar::conexion();
	$this->cliente = array();
    }		
    public function get_clientes()
	{
            $sql = "SELECT * FROM cliente";
            $resultado = $this->db->query($sql);
//La función fetch_assoc() en PHP se utiliza para obtener una fila 
            //de resultados de una consulta SQL como un arreglo asociativo, donde 
            //cada columna de la fila se convierte en una clave del arreglo, con 
            //el nombre de la columna como clave y el valor de la celda como el 
            //valor correspondiente.
            while($row = $resultado->fetch_assoc())
            {
            	$this->cliente[] = $row;
            }
            return $this->cliente;
	}
//METODO INSERTAR
    public function insertar($nombre, $sector, $telefono, $correo, $direccion){			
		$resultado = $this->db->query("INSERT INTO cliente (nombre, sector, telefono, correo_c, direccion) VALUES ('$nombre', '$sector', '$telefono', '$correo', '$direccion')");			
    }

//METODO MODIFICAR
    public function modificar($id, $nombre, $sector, $telefono, $correo, $direccion){
			$resultado = $this->db->query("UPDATE cliente SET nombre='$nombre', sector='$sector', telefono='$telefono', correo_c='$correo', direccion='$direccion' WHERE id_c = '$id'");			
		}

//METODO ELIMINAR
		public function eliminar($id){
			$resultado = $this->db->query("DELETE FROM cliente WHERE id_c = '$id'");
		}
        
//METODO OBTENER CLIENTES
public function get_cliente($id)
		{
			$sql = "SELECT * FROM cliente WHERE id_c='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
}
