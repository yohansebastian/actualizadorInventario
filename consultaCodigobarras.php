<?php
require_once('config.php');
 
if (isset($_REQUEST['barcode'])){
    $codigo  = $_REQUEST['barcode'];
 
    $result = $connexion->query(
        'SELECT * FROM productos WHERE p_codigoBarras = '.$codigo
    );
     
    $data = $result->fetch_assoc();
     
    $row = array(
        'p_codigo' => $data['p_codigo'],
        'p_nombre' => utf8_encode($data['p_nombre']),
        'p_departamento' => $data['p_departamento'],
        'p_precioAnt' => $data['p_precioAnt'],
        'p_precioAct' => $data['p_precioAct'],
        'p_activo' => $data['p_activo'],
        'p_regitradoEn' => $data['p_regitradoEn'],
        'p_modificadoEn' => $data['p_modificadoEn']
    );
     
    if (is_array($row)) {
        echo json_encode($row);
    }
    
}

?>