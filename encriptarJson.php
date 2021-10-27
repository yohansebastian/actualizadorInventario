<?php

$contenedorjson=file_get_contents('./data.json');
$cont = json_decode($contenedorjson,true);

print_r($cont['Departamento']);

$real = $cont['Departamento'];

$convertArrayToString = implode(" ",$real);

print_r ($convertArrayToString);

//print_r(array_chunk($cont,45));
// Encriptar JSON
$encriptar = base64_encode($convertArrayToString);
//echo ( $encriptar);
//echo ("<pre>");
//Desencriptar JSON
$desencriptar= base64_decode($encriptar);
//echo ("<pre>");
//echo ($desencriptar);
//echo ("<pre>");

?>