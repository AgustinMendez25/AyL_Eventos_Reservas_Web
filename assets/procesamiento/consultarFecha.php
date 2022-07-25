<?php
    include('../../conexion.php');


    if(isset($_POST['fecha'])){
        $query = "SELECT horario,hora,localidad FROM reserva where fecha = '".$_POST['fecha']."'";
        $result = mysqli_query($conexion, $query);
        if(!$result) {
            die('Query Error'. mysqli_error($conexion));
        }


            $json = array();
            while($row = mysqli_fetch_array($result)) {
                $json[] = array(
                    'horario' => $row['horario'],
                    'hora' => $row['hora'],
                    'localidad' => $row['localidad']
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
    }

?>