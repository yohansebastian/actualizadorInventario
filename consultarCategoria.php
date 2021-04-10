<?php
if (isset($_REQUEST['catg']))
{
    $categoria  = $_REQUEST['catg'];
    
     include 'baseDatos.php';
    
     $transaccion = new baseDatos();
    $consultaSQL="SELECT * FROM categoria";
     $resultado=$transaccion -> buscarDatos($consultaSQL);
     for ($i=0; $i <count($resultado) ; $i++) { 
        $nombre = ($resultado[$i]['c_id']);
        $valor = ($resultado[$i]['c_nombre']);

        echo "<option value='$nombre'>$valor</option>";
     }

}

?>