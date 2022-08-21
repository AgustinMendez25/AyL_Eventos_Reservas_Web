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
        $cantEntradas = $_POST['cantEntradas'];
        $cantEntradasEspeciales = $_POST['cantEntradasEspeciales'];
        if($precio == null){ $precio = 0; }
        if($traslado == null){ $traslado = 0; }
        if($seña == null){ $seña = 0; }
        if($hora == null){ $hora = ""; }
        if($direccion == null){ $direccion = ""; }
        if($cantChicos == null){ $cantChicos = 0; }
        if($cantAdultos == null){ $cantAdultos = 0; }
        if($cantVariedades == null){ $cantVariedades = 0; }
        if($cantEntradas == null){ $cantEntradas = 0; }
        if($cantEntradasEspeciales == null){ $cantEntradasEspeciales = 0; }
        
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
                seña,
                infoAdicional) values(
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
                ".$seña.",
                '".$_POST['infoAdicional']."'
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
                seña,
                infoAdicional) values(
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
                ".$seña.",
                '".$_POST['infoAdicional']."'
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
            $query = "INSERT into variedadesreserva(idReserva, idVariedad) values ";
            for ($i=0; $i < $_POST['cantVariedades']; $i++) { 
                $query = $query."(".$idRes.",99),";
            }
            $query = rtrim($query, ",");
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

        if ($_POST['entradas']== "" and $_POST['entradasEspeciales']== "" and ($_POST['cantEntradas'] != 0 or $_POST['cantEntradasEspeciales'] != 0)) {
            if ($_POST['cantEntradas'] != 0) {
                $query = "INSERT into entradasreserva(idReserva, idEntrada) values ";
                for ($i=0; $i < $_POST['cantEntradas']; $i++) { 
                    $query = $query."(".$idRes.",99),";
                }
                $query = rtrim($query, ",");
                $envio = $conexion->query($query);
            }  
            if ($_POST['cantEntradasEspeciales'] != 0) {
                $query = "INSERT into entradasespecialesreserva(idReserva, idEntradaEspecial) values ";
                for ($i=0; $i < $_POST['cantEntradasEspeciales']; $i++) { 
                    $query = $query."(".$idRes.",99),";
                }
                $query = rtrim($query, ",");
                $envio = $conexion->query($query);
            }          
        }else{
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