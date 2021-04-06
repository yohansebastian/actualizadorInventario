<?php

class baseDatos{
    public $usuarioBD="root";
    public $passwordBD="";
    //VARIABLES
    //SACAR COPIA DE LAS CLASES
    public function _construct(){

    }
    // FUNCIONES
    public function conectarBD ()
    {
        try{
            $infoBD="mysql:host=localhost;dbname=actualizadorinventario";
            $conexionBD = new PDO ($infoBD,$this->usuarioBD,$this->passwordBD);
            return($conexionBD);
        }
        catch(PDOException $error){
            echo ($error -> getMessage());
        }
    }
    
      public function buscarDatos($queryif)
{
    //1. Conectarme a la BaseDatos
    $conectarBD=$this -> conectarBD();
    //2. Preparar la Consulta
    $consultaBuscarDatos = $conectarBD -> prepare ($queryif);
    //3. Indicar metodo para listar los Datos 
    $consultaBuscarDatos -> setFetchMode(PDO::FETCH_ASSOC);
    //4. Ejecutar la consulta 
    $consultaBuscarDatos -> execute ();
    // 5. Mostrar los datos buscados
    return($consultaBuscarDatos->fetchAll());
}
public function insertarDatos($consultaSQL)
{
    // CONEXION A LA BASE DE DATOS
    $conectarBD=$this -> conectarBD();
    // PREPARAR CONSULTA
    $consultaInsertarDatos = $conectarBD -> prepare($consultaSQL);
    // EJECUTAR LA CONSULTA
    $resultado=$consultaInsertarDatos -> execute();
    // VERIFICAR EL RESULTADO
    if($resultado){
        echo("Registro Agregado con éxito");
    }else{
        echo("Error Agregando el registro");
    }
}

}

?>