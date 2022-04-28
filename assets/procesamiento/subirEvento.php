<?php
    include("../../conexion.php");

    echo 'Subir evento\n';

    if ( isset($_POST['btn-agregar'])){
        echo 'entre al if';
        $query = "insert into cliente(nombre, mail, telefono) values('".$_POST['nombreCliente']."', '".$_POST['mailCliente']."', '".$_POST['telefonoCliente']."')";
        echo 'query cliente:';
        echo $query;
        $envio = $conexion->query($query);
        
        $query2 = "insert into reserva(
            idCliente,
            fecha,
            horario,
            hora,
            cantAdultos,
            cantChicos,
            localidad,
            direccion,
            precio,
            seña) values(
            (select max(idCliente) as idCliente from cliente),
            '".$_POST['fecha']."',
            '".$_POST['horario']."',
            '".$_POST['hora']."',
            ".$_POST['cantAdultos'].",
            ".$_POST['cantChicos'].",
            '".$_POST['localidad']."',
            '".$_POST['direccion']."',
            ".$_POST['precio'].",
            ".$_POST['seña']."
            )";
        echo 'query reserva:';
        echo $query2;
        $envio2 = $conexion->query($query2);
    }

?>