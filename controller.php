<?php

include_once 'autocompletar.php';

$modelo = new autocompletar();

$texto = $_GET['nombre'];

$res=$modelo->buscar($texto);

echo json_encode($res);


?>