<?php
    include('../../conexion.php');

    if(isset($_POST['idEvento'])){
        $query = "delete from reserva where idReserva = ".$_POST['idEvento'];
        $result = mysqli_query($conexion, $query);
        if(!$result) {
            die('Query Error'. mysqli_error($conexion));
        }
    }

?>