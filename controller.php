<?php

include_once 'autocompletar.php';

$modelo = new autocompletar();

$texto = $_GET['nombre'];

$res=$modelo->buscar(strtoupper($texto));

echo json_encode($res);


?>