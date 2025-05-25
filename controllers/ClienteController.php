<?php
class ClienteController {		
    public function __construct(){
        require_once "../models/ClienteModel.php";
    }		
    public function index(){			
        $cliente = new Cliente_model();
        //creando la variable titulo en el arreglo data:
        $data["titulo"] = "Clientes";
        $data["cliente"] = $cliente->get_clientes();
        require_once "../view/clientes/clientes.php";		
    }

	public function PDF(){
		$cliente = new Cliente_model();
        $data["cliente"] = $cliente->get_clientes();
        require_once(__DIR__ . '/../view/fpdf/PruebaV.php');
	}

    //FUNCION NUEVO()
    public function nuevo(){			
		$data["titulo"] = "Clientes";
        require_once "../view/clientes/clientes_nuevo.php";
	}
    //FUNCION GUARDA()
    public function guarda(){
			$nombre = $_POST['nombre'];
			$sector = $_POST['sector'];
			$telefono = $_POST['telefono'];
			$correo = $_POST['correo_c'];
			$direccion = $_POST['direccion'];
			$cliente = new Cliente_model();
			$cliente->insertar($nombre, $sector, $telefono, $correo, $direccion);
			$data["titulo"] = "Clientes";
			$this->index();
    }

    public function modificar($id){
			$cliente = new Cliente_model();

			$data["id_c"] = $id;
			$data["cliente"] = $cliente->get_cliente($id);
			$data["titulo"] = "Cliente";
            require_once "../view/clientes/clientes_modifica.php";
		}
		
		public function actualizar(){
			$id = $_POST['id_c'];
			$nombre = $_POST['nombre'];
			$sector = $_POST['sector'];
			$telefono = $_POST['telefono'];
			$correo = $_POST['correo_c'];
			$direccion = $_POST['direccion'];

			$cliente = new Cliente_model();
			$cliente->modificar($id, $nombre, $sector, $telefono, $correo, $direccion);
			$data["titulo"] = "Clientes";
			$this->index();
		}
		
		public function eliminar($id){
			$cliente = new Cliente_model();
			$cliente->eliminar($id);
			$data["titulo"] = "Clientes";
			$this->index();
		}
}

