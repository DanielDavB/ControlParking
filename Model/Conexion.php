<?php

class Conexion{

    private $con;

    public function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'controlParking');
    }

    public function getAgenda(){
        $query = $this->con->query('SELECT num_placa, entrada, salida, tiempo, tipo, monto FROM parkagenda');

        $retorno = [];

        $i = 0;
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }
	public function saveAgenda(){
		$placa = $_POST['placa'];
		$entrada = $_POST['entrada'];
		$salida = $_POST['salida'];
		$tipo = $_POST['tipo'];
		$tiempo = (strtotime($salida) - strtotime($entrada)) / 60;

		if($tipo == "residente"){
			$monto = $tiempo * 1;
		}else if($tipo == "no residente"){
			$monto = $tiempo * 3;
		}else{
			$monto = 0;
		}
		$query = $this->con->query("INSERT INTO parkagenda (num_placa, entrada, salida, tiempo, tipo, monto) VALUES ('$placa', '$entrada', '$salida', '$tiempo', '$tipo', '$monto')");
	
		return $query;
	}
	public function editAgenda(){
		$id = $_POST['id'];
		$placa = $_POST['placa'];
		$entrada = $_POST['entrada'];
		$salida = $_POST['salida'];
		$tipo = $_POST['tipo'];
		$tiempo = (strtotime($salida) - strtotime($entrada)) / 60;

		if($tipo == "residente"){
			$monto = $tiempo * 1;
		}else if($tipo == "no residente"){
			$monto = $tiempo * 3;
		}else{
			$monto = 0;
		}
		$query = $this->con->query("UPDATE parkagenda SET num_placa = '$placa', entrada = '$entrada', salida = '$salida', tiempo = '$tiempo', tipo = '$tipo', monto = '$monto' WHERE id = '$id'");
	
		return $query;
	}
	public function getAgendaByPlaca($placa) {
		$stmt = $this->con->prepare("SELECT num_placa, entrada, salida, tiempo, tipo, monto FROM parkagenda WHERE num_placa = ?");
		$stmt->bind_param("s", $placa);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		$stmt->close();
	
		return $data;
	}
	
}

?>