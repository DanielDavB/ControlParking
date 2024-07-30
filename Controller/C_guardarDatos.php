<?php

require_once(__DIR__ . '/../Model/Conexion.php');

$con = new Conexion();

$agenda = $con->saveAgenda();

require(__DIR__ . '/../Views/V_verDatos.php');

?>
