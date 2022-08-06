<?php
    include('../../conexion.php');

    if(isset($_POST['idEvento'])){
        $query1 = "delete from variedadesreserva where idReserva = ".$_POST['idEvento'];
        $result1 = mysqli_query($conexion, $query1);

        $query2 = "delete from variedadesextrareserva where idReserva = ".$_POST['idEvento'];
        $result2 = mysqli_query($conexion, $query2);

        $query3 = "delete from entradasreserva where idReserva = ".$_POST['idEvento'];
        $result3 = mysqli_query($conexion, $query3);

        $query4 = "delete from entradasespecialesreserva where idReserva = ".$_POST['idEvento'];
        $result4 = mysqli_query($conexion, $query4);

        $query5 = "delete from reserva where idReserva = ".$_POST['idEvento'];
        $result5 = mysqli_query($conexion, $query5);
        
    }

?>