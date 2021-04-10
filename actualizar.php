<?php

include("baseDatos.php");
// Se reciben los datos de los campos del formulario
if(isset($_POST["enviar"])){
    $codigo=$_POST["codigo"];
    $nombre=$_POST["nombre"];
    $departamento=$_POST["departamento"];
    $precioAnt=$_POST["precioAnt"];
    $precioAct=$_POST["precioAct"];
    $activo=$_POST["activo"];
    $codigobarras=$_POST["codigobarras"];
    $registradoen=$_POST["registradoen"];
    $modificadoen=$_POST["modificadoen"];
    //$productos = array($codigo,$nombre,$categoria,$precio,$costo,$iva,$fecha,$estado);
        $transaccion = new baseDatos();
        //CONSULTA PARA INSERTAR DATOS
        $consultaSQL ="SELECT * FROM productos WHERE p_codigo =$codigo ";
        $productos=$transaccion-> buscarDatos($consultaSQL);
        $resultado=$productos[0]['p_codigo'];
        $resultado2=$productos[0]['p_codigoBarras'];
        echo var_dump($resultado2);
        die();
        if ($resultado==$codigo){
                $consultaSQL= "UPDATE productos SET p_nombre='$nombre',p_departamento='$departamento',p_precioAnt='$precioAnt',p_precioAct='$precioAct',p_activo=$activo,p_codigoBarras='$codigobarras',p_regitradoEn='$registradoen',p_modificadoEn='$modificadoen' WHERE p_codigo='$codigo'";
                echo "<br>";
                echo "<br>";
                echo $consultaSQL;
                $transaccion = new baseDatos();
                $transaccion ->insertarDatos($consultaSQL); 
            }elseif ($resultado2==$codigobarras){
                $consultaSQL= "UPDATE productos SET p_nombre='$nombre',p_departamento='$departamento',p_precioAnt='$precioAnt',p_precioAct='$precioAct',p_activo=$activo,p_codigoBarras='$codigobarras',p_regitradoEn='$registradoen',p_modificadoEn='$modificadoen' WHERE p_codigoBarras='$codigobarras'";
                echo "<br>";
                echo "<br>";
                echo $consultaSQL;
                $transaccion = new baseDatos();
                $transaccion ->insertarDatos($consultaSQL); 
            }
            else
                $consultaSQL= "INSERT INTO productos (p_id,p_codigo,p_nombre,p_departamento,p_precioAnt,p_precioAct,p_activo,p_codigoBarras,p_regitradoEn,p_modificadoEn)
                VALUES ('','$codigo','$nombre','$departamento','$precioAnt','$precioAct',$activo,'$codigobarras','$fecha','$estado')";
                  echo "<br>";
                  echo "<br>";
                  echo $consultaSQL;
                  $transaccion = new baseDatos();
                  $transaccion ->insertarDatos($consultaSQL); 
}
// Se verifica que si se lea correctamente los datos que entran del formulario
//header("location:index.html");
?>