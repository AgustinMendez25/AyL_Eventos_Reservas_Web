<?php
    include("../../conexion.php");

    if ( isset($_POST['btn-agregar'])){
        
        $query = "update reserva set
            fecha = '".$_POST['fecha']."',
            horario = '".$_POST['horario']."',
            hora = '".$_POST['hora']."',
            cantAdultos = ".$_POST['cantAdultos'].",
            cantChicos = ".$_POST['cantChicos'].",
            localidad = '".$_POST['localidad']."',
            direccion = '".$_POST['direccion']."',
            precio = ".$_POST['precio'].",
            seña = ".$_POST['seña']."
            where idReserva = ".$_POST['idRes']
        ;
        
        $envio = $conexion->query($query);
        
        header("Location:../../tabla.php");
    }
?>