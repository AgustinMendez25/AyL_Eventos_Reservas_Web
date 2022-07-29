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
            <form action="assets/procesamiento/updateEvento.php" method="POST">
                <?php
                    $query = "select fecha,idReserva,localidad,cantAdultos,cantChicos,direccion,horario,hora,precio,seña,nombre from reserva r inner join cliente c on r.idCliente = c.idCliente where idReserva = ".$_GET['id'];
                    $envio = $conexion->query($query);
                    while($row=$envio->fetch_assoc()){

                ?>

                <input style="display:none" name="idRes" type="number" value="<?php echo $_GET['id'] ?>">

                <h5>Evento del Cliente: <?php echo $row['nombre'] ?></h5>

                <h5>Detalles del Evento</h5>
                <input type="date" name="fecha" value="<?php echo $row['fecha'] ?>">
                <div class="div-dosHijos">
                    <select name="horario">
                        <option value="mediodia">Mediodia</option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                    </select>
                    <input type="time" name="hora" value="<?php echo $row['hora'] ?>">
                </div>
                <div class="div-dosHijos">
                    <div>
                        <label for="">Adultos</label>
                        <input type="number" name="cantAdultos" min="25" value="<?php echo $row['cantAdultos'] ?>">
                    </div>
                    <div>
                        <label for="">Niños</label>
                        <input type="number" name="cantChicos" value="<?php echo $row['cantChicos'] ?>">
                    </div>
                </div>
                <input type="text" name="localidad" placeholder="Localidad" value="<?php echo $row['localidad'] ?>">
                <input type="text" name="direccion" placeholder="Dirección" value="<?php echo $row['direccion'] ?>">
                <input type="number" name="precio" placeholder="Precio" value="<?php echo $row['precio'] ?>">
                <input type="number" id="seña" name="seña" placeholder="Seña" value="<?php echo $row['seña'] ?>">
                
                <h5>Variedades y Entradas</h5>
                <input type="button" class="botonInput" id="btnVariedades" value="Variedades">
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
                                $query = "SELECT variedad FROM variedades";
                                $envio = $conexion->query($query);
                                while($row=$envio->fetch_assoc()){
                            ?>
                             <span name="variedades[]"><?php echo $row['variedad'];?></span>
                            <?php } ?>
                            <h5>Variedades Extras</h5>
                            <?php //PHP VARIEDADES
                                $query = "SELECT variedadextra FROM variedadesextra";
                                $envio = $conexion->query($query);
                                while($row=$envio->fetch_assoc()){
                            ?>
                             <span name="variedadesExtra[]"><?php echo $row['variedadextra'];?></span>
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
                                $query = "SELECT entrada FROM entradas";
                                $envio = $conexion->query($query);
                                while($row=$envio->fetch_assoc()){
                            ?>
                            <span name="entradas[]"><?php echo $row['entrada'];?></span>
                            <?php } ?>
                            <h5>Entradas Especiales</h5>
                            <?php //PHP ENTRADAS
                                $query = "SELECT entradaespecial FROM entradasespeciales";
                                $envio = $conexion->query($query);
                                while($row=$envio->fetch_assoc()){
                            ?>
                            <span name="entradasEspeciales[]"><?php echo $row['entradaespecial'];?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="div-acciones">
                    <a href="tabla.php"><input type="button" id="btn-cancelar" value="Cancelar"></a>
                    <input type="submit" name="btn-agregar" id="btn-agregar" value="Agregar">
                </div>
            </form>
        </div>
    </div>

    <!--JS-->
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/seleccionar.js"></script> 

</body>

</html>

<?php } ?>