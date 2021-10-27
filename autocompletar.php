<?php

include_once 'basedatos.php';

class Autocompletar extends baseDatos{

    function buscar($texto){
        $res=array();
        $query = $this->conectarBD()->prepare('SELECT * FROM productos WHERE LOWER(p_nombre) LIKE  :texto ');
        $query->execute(['texto' =>'%'. str_replace('Ñ','%',$texto).'%']);

        if($query->rowCount()){
            while($r=$query->fetch()){
                array_push($res,$r['p_nombre']);
                array_push($res,$r['p_codigo']);
                array_push($res,$r['p_departamento']);
                array_push($res,$r['p_precioAnt']);
                array_push($res,$r['p_precioAct']);
                array_push($res,$r['p_activo']);
                array_push($res,$r['p_codigoBarras']);
            }
        }
            return $res;
    }
 }
?>