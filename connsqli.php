<?php
    $mysqli=   new mysqli("localhost","root","","actualizadorinventario");
    $mysqli->query("SET NAMES 'UTF-8'");
    if($mysqli->connect_errno){
        echo "Fallo al conectar a MYSQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
    }

?>