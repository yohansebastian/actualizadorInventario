<?php

include ("baseDatos.php");
 
if (isset($_POST['archivo']))
{
    $contenedorjson=file_get_contents('./data.json');
    $cont = json_decode($contenedorjson,true);

  $item=$cont['Producto'];
  $departamento = $cont['Departamento'];

  // Cargar Departamentos Desde el archivo JSON 
    for ($i=0;$i<count($departamento);$i++){
        $c_id=$departamento[$i]['d_id'];
        $c_nombre=$departamento[$i]['nombre'];

        $queryif = "SELECT * FROM categoria WHERE c_id = $c_id";
        $transaccion = new baseDatos();
        $categoria = $transaccion->buscarDatos($queryif);
        $validarId=$categoria[0]['c_id'];
        if($validarId==$c_id){
            $consultaSQL= "UPDATE categoria SET c_nombre='$c_nombre' WHERE c_id='$c_id'";
            echo "<br>";
            echo "<br>";
            //echo $consultaSQL;
            $transaccion = new baseDatos();
            $transaccion ->insertarDatos($consultaSQL);
        }else{
            $consultaSQL= "INSERT INTO categoria (c_id,c_nombre) VALUES ('$c_id','$c_nombre')";
            $transaccion = new baseDatos();
            $transaccion ->insertarDatos($consultaSQL); 
        }
    }


  for ($i=0;$i<count($item);$i++)
  {
    //echo $real[$i]['nombre'].$real[$i]['Categoria'];

        $codigo=$item[$i]['p_codigo'];
        $nombre=$item[$i]['p_nombre'];  
        $departamento=$item[$i]['p_departamento'];
        $precioAnt=$item[$i]['p_precioAnt'];
        $precioAct=$item[$i]['p_precioAct'];
        $activo=$item[$i]['p_activo'];
        $codigobarras=$item[$i]['p_codigoBarras'];


        $queryif ="SELECT * FROM productos WHERE p_codigo =$codigo ";
        $transaccion = new baseDatos();
        $productos=$transaccion-> buscarDatos($queryif);
        $asunto=$productos[0]['p_codigo'];
        $asunto2=$productos[0]['p_codigoBarras'];
    
 
        if ($asunto==$codigo){
            $consultaSQL= "UPDATE productos SET p_nombre='$nombre',p_departamento='$departamento',p_precioAnt='$precioAnt',p_precioAct='$precioAct',p_activo='$activo',p_codigoBarras='$codigobarras' WHERE p_codigo='$codigo'";
            echo "<br>";
            echo "<br>";
           // echo $consultaSQL;
            $transaccion = new baseDatos();
            $transaccion ->insertarDatos($consultaSQL); 
            
        }elseif($asunto2==$codigobarras){
            $consultaSQL= "UPDATE productos SET p_nombre='$nombre',p_departamento='$departamento',p_precioAnt='$precioAnt',p_precioAct='$precioAct',p_activo='$activo' WHERE p_codigoBarras='$codigobarras'";
            echo "<br>";
            echo "<br>";
           // echo $consultaSQL;
            $transaccion = new baseDatos();
            $transaccion ->insertarDatos($consultaSQL);
        }
        else
            $consultaSQL= "INSERT INTO productos (p_codigo,p_nombre,p_departamento,p_precioAnt,p_precioAct,p_activo,p_codigoBarras)
            VALUES ('$codigo','$nombre','$departamento','$precioAnt','$precioAct','$activo','$codigobarras')";
              echo "<br>";
              echo "<br>";
              //echo $consultaSQL;
              $transaccion = new baseDatos();
              $transaccion ->insertarDatos($consultaSQL); 
    }
}