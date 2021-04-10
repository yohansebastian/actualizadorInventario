<?php

if (isset($_REQUEST['barcode']))
{
    $codigo  = $_REQUEST['barcode'];
    
     include 'baseDatos.php';
    
     $transaccion = new baseDatos();
    $queryif="SELECT p_codigo,p_nombre,p_departamento,p_precioAnt,p_precioAct,p_activo,p_regitradoEn,p_modificadoEn FROM productos WHERE p_codigoBarras = $codigo";
     $consulta=$transaccion -> buscarDatos($queryif);

    // Imprimir el valor que decida del arreglo
    
    $nombre = ($consulta[0]['p_nombre']);

    echo $nombre;
}

?>