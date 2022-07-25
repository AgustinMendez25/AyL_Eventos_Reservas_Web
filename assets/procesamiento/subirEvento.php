<?php
    include("../../conexion.php");

    echo 'Subir evento\n';

    if ( isset($_POST['btn-agregar'])){
        $query2 = "";
        if ( $_POST['idCliente'] == ""){ //Crear cliente y subir registro de reserva
            $query = "insert into cliente(nombre, mail, telefono) values('".$_POST['nombreCliente']."', '".$_POST['mailCliente']."', '".$_POST['telefonoCliente']."')";
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
        }else{ //Usar cliente existente y subir registro de reserva
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
                ".$_POST['idCliente'].",
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
        }

        $envio2 = $conexion->query($query2);
        
        header("Location:../../tabla.php");
    }
?>