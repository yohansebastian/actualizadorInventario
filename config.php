<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'actualizadorinventario');
define('NUM_ITEMS_BY_PAGE', 10);
 
$connexion =  mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE) or die("no hay conexion");

if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
  }
  echo "";


?>