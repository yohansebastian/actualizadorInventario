<?php

include_once 'basedatos.php';

class Autocompletar extends baseDatos{

    function buscar($texto){
        $res=array();
        $query = $this->conectarBD()->prepare('SELECT * FROM productos WHERE BINARY p_nombre LIKE :texto ');
        $query->execute(['texto' => $texto.'%']);

        if($query->rowCount()){
            while($r=$query->fetch()){
                array_push($res,$r['p_nombre']);
            }
        }
            return $res;
        
    }
    function buscarTodo($texto){
        $res=array();
        $query = $this->conectarBD()->prepare('SELECT * FROM productos WHERE BINARY p_nombre LIKE :texto ');
        $query->execute(['texto' => $texto.'%']);

        if($query->rowCount()){
            while($r=$query->fetch()){
                array_push($res,$r['p_nombre']);
            }
        }
            return $res;
        
    }


 }


?>