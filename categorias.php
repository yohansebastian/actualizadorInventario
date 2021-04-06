<?php    include("connsqli.php");

        $sql="SELECT * FROM categoria WHERE =1";
        $resultado=$mysqli->query($sql);

        while( $data = $mysqli_fetch_array($resultado)){
            $categoria[]=$array=array(
                'c_id'=> $data['c_id'],
                'c_nombre'=>$data['c_nombre']
            );
        }
        echo json_encode($categoria);
?>        
