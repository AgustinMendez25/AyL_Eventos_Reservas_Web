<?php
    include("../../conexion.php");


    if ($_POST['fecha'] != "" and $_POST['localidad'] != ""){
        
        $precio = $_POST['precio'];
        $seña = $_POST['seña'];
        $hora = $_POST['hora'];
        $direccion = $_POST['direccion'];
        if($precio == null){ $precio = 0; }
        if($seña == null){ $seña = 0; }
        if($hora == null){ $hora = ""; }
        if($direccion == null){ $direccion = ""; }
        
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
                '".$hora."',
                ".$_POST['cantAdultos'].",
                ".$_POST['cantChicos'].",
                '".$_POST['localidad']."',
                '".$direccion."',
                ".$precio.",
                ".$seña."
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
                '".$hora."',
                ".$_POST['cantAdultos'].",
                ".$_POST['cantChicos'].",
                '".$_POST['localidad']."',
                '".$direccion."',
                ".$precio.",
                ".$seña."
                )";
        }

        $envio2 = $conexion->query($query2);

        if(isset($_POST['entradas']) and $_POST['entradas']!= ""){
            $query3 = "INSERT into entradasreserva(idReserva, idEntrada) values ";
            $entradas = explode(",",$_POST['entradas']);
            for ($x = 0; $x < count($entradas); $x++) {
                $query3 = $query3."((select max(idReserva) from reserva), ".$entradas[$x]."), ";
            }
            $query3 = rtrim($query3,", ");

            $envio3 = $conexion->query($query3);
        }

        if(isset($_POST['entradasEspeciales']) and $_POST['entradasEspeciales']!= ""){
            $query4 = "INSERT into entradasespecialesreserva(idReserva, idEntradaEspecial) values ";
            $entradas = explode(",",$_POST['entradasEspeciales']);
            for ($x = 0; $x < count($entradas); $x++) {
                $query4 = $query4."((select max(idReserva) from reserva), ".$entradas[$x]."), ";
            }
            $query4 = rtrim($query4,", ");

            $envio3 = $conexion->query($query4);
        }

        
        if(isset($_POST['variedades']) and $_POST['variedades']!= ""){
            $query5 = "INSERT into variedadesreserva(idReserva, idVariedad) values ";
            $variedades = explode(",",$_POST['variedades']);
            for ($x = 0; $x < count($variedades); $x++) {
                $query5 = $query5."((select max(idReserva) from reserva), ".$variedades[$x]."), ";
            }
            $query5 = rtrim($query5,", ");

            $envio5 = $conexion->query($query5);
        }

        if(isset($_POST['variedadesExtra']) and $_POST['variedadesExtra']!= ""){
            $query6 = "INSERT into variedadesextrareserva(idReserva, idVariedadExtra) values ";
            $variedades = explode(",",$_POST['variedadesExtra']);
            for ($x = 0; $x < count($variedades); $x++) {
                $query6 = $query6."((select max(idReserva) from reserva), ".$variedades[$x]."), ";
            }
            $query6 = rtrim($query6,", ");

            $envio6 = $conexion->query($query6);
        }

        echo true;

    }else{
        echo false;
    }
    /*
    $json[] = array(
        'q' => $query2
    );

    $jsonstring = json_encode($json);

    echo $jsonstring;*/

?>