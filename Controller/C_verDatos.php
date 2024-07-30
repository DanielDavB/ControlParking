<?php

require('Model/Conexion.php');

$con = new Conexion();

$agenda = $con->getAgenda();

require('Views/V_verDatos.php');

?>