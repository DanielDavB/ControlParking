<?php

require(__DIR__ . '/../Model/Conexion.php');

$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $placa = $_POST['placa'];
    $entrada = $_POST['entrada'];
    $salida = $_POST['salida'];
    $tipo = $_POST['tipo'];
    $tiempo = (strtotime($salida) - strtotime($entrada)) / 60;

    if ($tipo == "residente") {
        $monto = $tiempo * 1;
    } else if ($tipo == "no residente") {
        $monto = $tiempo * 3;
    } else {
        $monto = 0;
    }

    $stmt = $con->prepare("UPDATE parkagenda SET entrada=?, salida=?, tiempo=?, tipo=?, monto=? WHERE num_placa=?");
    $stmt->bind_param("ssisis", $entrada, $salida, $tiempo, $tipo, $monto, $placa);
    $stmt->execute();
    $stmt->close();
    $con->close();

    header('Location: ../Views/V_verDatos.php');
} else if (isset($_GET['placa'])) {
    $placa = $_GET['placa'];
    $data = $con->getAgendaByPlaca($placa);

    header('Content-Type: application/json');
    echo json_encode($data);
}
