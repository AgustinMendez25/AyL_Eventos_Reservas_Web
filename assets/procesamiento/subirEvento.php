<?php
    include("../../conexion.php");


    if ($_POST['fecha'] != "" and $_POST['localidad'] != ""){
        
        $precio = $_POST['precio'];
        $traslado = $_POST['traslado'];
        $seña = $_POST['seña'];
        $hora = $_POST['hora'];
        $direccion = $_POST['direccion'];
        $cantChicos = $_POST['cantChicos'];
        $cantAdultos = $_POST['cantAdultos'];
        $cantVariedades = $_POST['cantVariedades'];
        if($precio == null){ $precio = 0; }
        if($traslado == null){ $traslado = 0; }
        if($seña == null){ $seña = 0; }
        if($hora == null){ $hora = ""; }
        if($direccion == null){ $direccion = ""; }
        if($cantChicos == null){ $cantChicos = 0; }
        if($cantAdultos == null){ $cantAdultos = 0; }
        if($cantVariedades == null){ $cantVariedades = 0; }
        
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
                traslado,
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
                ".$traslado.",
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
                traslado,
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
                ".$traslado.",
                ".$seña."
                )";
        }

        $envio2 = $conexion->query($query2);

        $idRes = 0;
        $queryID = "select max(idReserva) as id from reserva";
        $envioID = $conexion->query($queryID);
        while($rowID = mysqli_fetch_array($envioID)) {
            $idRes = $rowID['id'];
        }

        if ($_POST['variedades']== "" and $_POST['variedadesExtra']== "" and $_POST['cantVariedades'] != 0) {
            $query = "";
            switch ($_POST['cantVariedades']) {
                case 6:
                    $query = "INSERT into variedadesreserva(idReserva, idVariedad) values
                    (".$idRes.",1),(".$idRes.",2),(".$idRes.",4),(".$idRes.",5),(".$idRes.",10),(".$idRes.",11)";
                    break;
                case 8:
                    $query = "INSERT into variedadesreserva(idReserva, idVariedad) values 
                    (".$idRes.",1),(".$idRes.",2),(".$idRes.",4),(".$idRes.",5),(".$idRes.",10),(".$idRes.",11),(".$idRes.",17),(".$idRes.",7)";
                    break;
                case 10:
                    $query = "INSERT into variedadesreserva(idReserva, idVariedad) values
                    (".$idRes.",1),(".$idRes.",2),(".$idRes.",4),(".$idRes.",5),(".$idRes.",10),(".$idRes.",11),(".$idRes.",17),(".$idRes.",7),(".$idRes.",6),(".$idRes.",12)";
                    break;
                case 12:
                    $query = "INSERT into variedadesreserva(idReserva, idVariedad) values
                    (".$idRes.",1),(".$idRes.",2),(".$idRes.",4),(".$idRes.",5),(".$idRes.",10),(".$idRes.",11),(".$idRes.",17),(".$idRes.",7),(".$idRes.",6),(".$idRes.",12),(".$idRes.",13),(".$idRes.",3)";
                    break;
                case 14:
                    $query = "INSERT into variedadesreserva(idReserva, idVariedad) values
                    (".$idRes.",1),(".$idRes.",2),(".$idRes.",4),(".$idRes.",5),(".$idRes.",10),(".$idRes.",11),(".$idRes.",17),(".$idRes.",7),(".$idRes.",6),(".$idRes.",12),(".$idRes.",13),(".$idRes.",3),(".$idRes.",8),(".$idRes.",9)";
                    break;
                case 16:
                    $query = "INSERT into variedadesreserva(idReserva, idVariedad) values
                    (".$idRes.",1),(".$idRes.",2),(".$idRes.",4),(".$idRes.",5),(".$idRes.",10),(".$idRes.",11),(".$idRes.",17),(".$idRes.",7),(".$idRes.",6),(".$idRes.",12),(".$idRes.",13),(".$idRes.",3),(".$idRes.",8),(".$idRes.",9),(".$idRes.",14),(".$idRes.",15)";
                    break;
                }
            $envio = $conexion->query($query);
        }else{
            if(isset($_POST['variedades']) and $_POST['variedades']!= ""){
                $query5 = "INSERT into variedadesreserva(idReserva, idVariedad) values ";
                $variedades = explode(",",$_POST['variedades']);
                for ($x = 0; $x < count($variedades); $x++) {
                    $query5 = $query5."(".$idRes.", ".$variedades[$x]."), ";
                }
                $query5 = rtrim($query5,", ");
    
                $envio5 = $conexion->query($query5);
            }
    
            if(isset($_POST['variedadesExtra']) and $_POST['variedadesExtra']!= ""){
                $query6 = "INSERT into variedadesextrareserva(idReserva, idVariedadExtra) values ";
                $variedades = explode(",",$_POST['variedadesExtra']);
                for ($x = 0; $x < count($variedades); $x++) {
                    $query6 = $query6."(".$idRes.", ".$variedades[$x]."), ";
                }
                $query6 = rtrim($query6,", ");
    
                $envio6 = $conexion->query($query6);
            }
        }

        if(isset($_POST['entradas']) and $_POST['entradas']!= ""){
            $query3 = "INSERT into entradasreserva(idReserva, idEntrada) values ";
            $entradas = explode(",",$_POST['entradas']);
            for ($x = 0; $x < count($entradas); $x++) {
                $query3 = $query3."(".$idRes.", ".$entradas[$x]."), ";
            }
            $query3 = rtrim($query3,", ");

            $envio3 = $conexion->query($query3);
        }

        if(isset($_POST['entradasEspeciales']) and $_POST['entradasEspeciales']!= ""){
            $query4 = "INSERT into entradasespecialesreserva(idReserva, idEntradaEspecial) values ";
            $entradas = explode(",",$_POST['entradasEspeciales']);
            for ($x = 0; $x < count($entradas); $x++) {
                $query4 = $query4."(".$idRes.", ".$entradas[$x]."), ";
            }
            $query4 = rtrim($query4,", ");

            $envio3 = $conexion->query($query4);
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