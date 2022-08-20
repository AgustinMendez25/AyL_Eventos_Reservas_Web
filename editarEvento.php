<?php
    include("conexion.php");

    session_start();

    if (empty($_SESSION['contraseña_admin'])){
        header("Location: ingreso.php");
    }
    else{

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AyL_Eventos_Reservas</title>

    <!--CSS-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>   

    <div class="contenedor">
        <div class="nav">
            <a href="tabla.php"><h1>A&L Eventos Reservas</h1></a>
        </div>
        <div class="contenedor-divForm">
            <h4>Editar Evento</h4>
            <div class="form">
                <?php
                    $query = "select fecha,idReserva,localidad,cantAdultos,cantChicos,direccion,horario,hora,precio,traslado,seña,nombre from reserva r inner join cliente c on r.idCliente = c.idCliente where idReserva = ".$_GET['id'];
                    $envio = $conexion->query($query);
                    while($row=$envio->fetch_assoc()){

                ?>

                <input style="display:none" id="idRes" type="number" value="<?php echo $_GET['id'] ?>">

                <h5>Evento del Cliente: <?php echo $row['nombre'] ?></h5>

                <h5>Detalles del Evento</h5>
                <input type="date" id="fecha" value="<?php echo $row['fecha'] ?>">
                <div class="div-dosHijos">
                    <select id="horario">
                        <option value="mediodia">Mediodia</option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                    </select>
                    <input type="time" id="hora" value="<?php echo $row['hora'] ?>">
                </div>
                <div class="div-dosHijos">
                    <div>
                        <label for="">Adultos</label>
                        <input type="number" id="cantAdultos" min="25" value="<?php echo $row['cantAdultos'] ?>">
                    </div>
                    <div>
                        <label for="">Niños</label>
                        <input type="number" id="cantChicos" value="<?php echo $row['cantChicos'] ?>">
                    </div>
                </div>
                <label>Localidad</label>
                <input type="text" id="localidad" style="margin:5px 0 10px 0" placeholder="Localidad" value="<?php echo $row['localidad'] ?>">
                <label>Dirección</label>
                <input type="text" id="direccion" style="margin:5px 0 10px 0" placeholder="Dirección" value="<?php echo $row['direccion'] ?>">
                <label>Precio</label>
                <input type="number" id="precio" style="margin:5px 0 10px 0" placeholder="Precio" value="<?php echo $row['precio'] ?>">
                <label>Traslado</label>
                <input type="number" id="traslado" style="margin:5px 0 10px 0" placeholder="Traslado" value="<?php echo $row['traslado'] ?>">
                <label>Seña</label>
                <input type="number" id="seña" id="seña" style="margin:5px 0 10px 0" placeholder="Seña" value="<?php echo $row['seña'] ?>">
                
                <h5>Variedades</h5>
                <input type="number" id="cantVariedades" placeholder="Cantidad Variedades">
                <input type="button" class="botonInput" id="btnVariedades" value="Variedades">

                <h5>Entradas</h5>
                <input type="number" id="cantEntradas" placeholder="Cantidad Entradas">
                <input type="number" id="cantEntradasEspeciales" placeholder="Cantidad Entradas Especiales">
                <input type="button" class="botonInput" id="btnEntradas" value="Entradas">

                <!--Modal Variedades-->
                <div class="modal" id="modalVariedades">
                    <div class="modal-caja" id="modalVariedades-caja">
                        <div class="header">
                            <h4>Variedades</h4>
                            <label id="cerrarModalVariedades">X</label>
                        </div>
                        <div class="contenido">
                            <h5>Variedades Comunes</h5>
                            <?php //PHP VARIEDADES
                                $query = "SELECT * FROM variedades where id != 99";
                                $envio = $conexion->query($query);
                                while($row=$envio->fetch_assoc()){
                            ?>
                             <span name="variedades[]" class="variedad" value=<?php echo $row['id'];?>><?php echo $row['variedad'];?></span>
                            <?php } ?>
                            <h5>Variedades Extras</h5>
                            <?php //PHP VARIEDADES
                                $query = "SELECT * FROM variedadesextra";
                                $envio = $conexion->query($query);
                                while($row=$envio->fetch_assoc()){
                            ?>
                             <span name="variedadesExtra[]" class="variedadExtra" value=<?php echo $row['id'];?>><?php echo $row['variedadextra'];?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!--Modal Entradas-->
                <div class="modal" id="modalEntradas">
                    <div class="modal-caja" id="modalEntradas-caja">
                        <div class="header">
                            <h4>Entradas</h4>
                            <label id="cerrarModalEntradas">X</label>
                        </div>
                        <div class="contenido">
                            <h5>Entradas Comunes</h5>
                            <?php //PHP ENTRADAS
                                $query = "SELECT * FROM entradas  where id != 99";
                                $envio = $conexion->query($query);
                                while($row=$envio->fetch_assoc()){
                            ?>
                            <span name="entradas[]" class="entrada" seleccionado=0 value=<?php echo $row['id'];?>><?php echo $row['entrada'];?></span>
                            <?php } ?>
                            <h5>Entradas Especiales</h5>
                            <?php //PHP ENTRADAS
                                $query = "SELECT * FROM entradasespeciales where id != 99";
                                $envio = $conexion->query($query);
                                while($row=$envio->fetch_assoc()){
                            ?>
                            <span name="entradasEspeciales[]" class="entradaEspecial" seleccionado=0 value=<?php echo $row['id'];?>><?php echo $row['entradaEspecial'];?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="div-acciones">
                    <a href="tabla.php"><input type="button" id="btn-cancelar" value="Cancelar"></a>
                    <input type="submit" name="btn-update" id="btn-update" value="Editar">
                </div>
            </div>
        </div>
    </div>

    <!--JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/seleccionar-agregar.js"></script> 
    <script src="assets/js/seleccionarUpdate.js"></script> 

</body>

</html>

<?php } ?>