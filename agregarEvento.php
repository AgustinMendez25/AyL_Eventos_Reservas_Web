<?php
    include("conexion.php");
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
            <h1>A&L Eventos Reservas</h1>
        </div>
        <div class="contenedor-divForm">
            <h4>Agregar Evento</h4>
            <form action="assets/procesamiento/subirEvento.php" method="POST">
                <h5>Detalles del Cliente</h5>
                <input type="text" name="nombreCliente" placeholder="Nombre">
                <input type="email" name="mailCliente" placeholder="Correo Electrónico">
                <input type="text" name="telefonoCliente" placeholder="Teléfono">
                <div class="contenedor-btnClienteExistente"><span id="btnClientes">Usar cliente existente</span></div>
                <!--Modal Clientes-->
                <div class="modal" id="modalClientes">
                    <div class="modal-caja" id="modalClientes-caja">
                        <div class="header">
                            <h4>Clientes</h4>
                            <label id="cerrarModalClientes">X</label>
                        </div>
                        <div class="contenido">
                            <?php //PHP CLIENTES
                                $query = "SELECT * FROM cliente";
                                $envio = $conexion->query($query);
                                while($row=$envio->fetch_assoc()){
                            ?>
                             <span name="clientes[]"><?php echo $row['nombre'];?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <h5>Detalles del Evento</h5>
                <input type="date" name="fecha">
                <div class="div-dosHijos">
                    <select name="horario">
                        <option value="mediodia">Mediodia</option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                    </select>
                    <input type="time" name="hora">
                </div>
                <div class="div-dosHijos">
                    <div>
                        <label for="">Adultos</label>
                        <input type="number" name="cantAdultos" min="25" value="25">
                    </div>
                    <div>
                        <label for="">Niños</label>
                        <input type="number" name="cantChicos" value="0">
                    </div>
                </div>
                <input type="text" name="localidad" placeholder="Localidad">
                <input type="text" name="direccion" placeholder="Dirección">
                <input type="number" name="precio" placeholder="Precio">
                <input type="number" id="seña" name="seña" placeholder="Seña">

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
                <div class="div-acciones">
                    <a href="tabla.php"><input type="button" id="btn-cancelar" value="Cancelar"></a>
                    <input type="submit" name="btn-agregar" id="btn-agregar" value="Agregar">
                </div>
            </form>
        </div>
    </div>

    <!--JS-->
    <script src="assets/js/modal.js"></script>

</body>

</html>