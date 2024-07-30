// Controller/C_consultarDatos.php
<?php

require_once(__DIR__ . '/../Model/Conexion.php');

$con = new Conexion();

if (isset($_GET['placa'])) {
    $placa = $_GET['placa'];
    $agenda = $con->getAgendaByPlaca($placa);
}

require(__DIR__ . '/../Views/V_verDatos.php');
?>
<script>
	//reload the page 
	window.location.reload();
</script>
