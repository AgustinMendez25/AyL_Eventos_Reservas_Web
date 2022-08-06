<?php
    include('../../conexion.php');

    $idReserva = $_POST['idReserva'];

    //ENTRADAS
    $query1 = "select * from entradasreserva er inner join entradas e on e.id = er.idEntrada where idReserva =".$idReserva;
    $result1 = mysqli_query($conexion, $query1);
    if(!$result1) {
        die('Query Error'. mysqli_error($conexion));
    }

    $entradas = "";
    while($row1 = mysqli_fetch_array($result1)) {
        $entradas = $entradas.$row1['entrada'].',';        
    }
    $entradas = rtrim($entradas,",");

    //ENTRADAS ESPECIALES
    $query2 = "select * from entradasespecialesreserva er inner join entradasespeciales e on e.id = er.idEntradaEspecial where idReserva =".$idReserva;
    $result2 = mysqli_query($conexion, $query2);
    if(!$result2) {
        die('Query Error'. mysqli_error($conexion));
    }

    $entradasEspeciales = "";
    while($row2 = mysqli_fetch_array($result2)) {
        $entradasEspeciales = $entradasEspeciales.$row2['entradaEspecial'].',';        
    }
    $entradasEspeciales = rtrim($entradasEspeciales,",");
    //VARIEDADES
    $query3 = "select * from variedadesreserva er inner join variedades e on e.id = er.idVariedad where idReserva =".$idReserva;
    $result3 = mysqli_query($conexion, $query3);
    if(!$result3) {
        die('Query Error'. mysqli_error($conexion));
    }
    
    $variedades = "";
    while($row3 = mysqli_fetch_array($result3)) {
        $variedades = $variedades.$row3['variedad'].',';        
    }
    $variedades = rtrim($variedades,",");
    
    
    //VARIEDADES EXTRA
    $query4 = "select * from variedadesextrareserva er inner join variedadesextra e on e.id = er.idVariedadExtra where idReserva =".$idReserva;
    $result4 = mysqli_query($conexion, $query4);
    if(!$result4) {
        die('Query Error'. mysqli_error($conexion));
    }

    $variedadesExtra = "";
    while($row4 = mysqli_fetch_array($result4)) {
        $variedadesExtra = $variedadesExtra.$row4['variedadextra'].',';        
    }
    $variedadesExtra = rtrim($variedadesExtra,",");

    /*
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'entradas' => $entradas
        );
    }*/

    $json[] = array(
        'entradas' => $entradas,
        'entradasEspeciales' => $entradasEspeciales,
        'variedades' => $variedades,
        'variedadesExtra' => $variedadesExtra
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
    

?>