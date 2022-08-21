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
            <h4>Agregar Evento</h4>
            <div class="form">
                <h5>Detalles del Cliente</h5>
                <input type="number" name="idCliente" id="idCliente" style="display:none">
                <input type="text" name="clienteExistente" id="clienteExistente" style="display:none;">
                <input type="text" name="nombreCliente" id="nombreCliente" placeholder="Nombre">
                <input type="email" name="mailCliente" id="mailCliente" placeholder="Correo Electrónico">
                <input type="text" name="telefonoCliente" id="telefonoCliente" placeholder="Teléfono">
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
                             <span name="clientes[]" class="cliente" value="<?php echo $row['idCliente'];?>"><?php echo $row['nombre'];?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <h5>Detalles del Evento</h5>
                <input type="date" id="fecha">
                <div class="div-dosHijos">
                    <select id="horario">
                        <option value="mediodia">Mediodia</option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                    </select>
                    <input type="time" id="hora">
                </div>
                <div class="div-dosHijos">
                    <div>
                        <label for="">Adultos</label>
                        <input type="number" id="cantAdultos" min="25" value="25">
                    </div>
                    <div>
                        <label for="">Niños</label>
                        <input type="number" id="cantChicos" value="0">
                    </div>
                </div>
                <label>Localidad</label>
                <input type="text" id="localidad" style="margin:5px 0 10px 0" placeholder="Localidad">
                <label>Dirección</label>
                <input type="text" id="direccion" style="margin:5px 0 10px 0" placeholder="Dirección">
                <label>Precio</label>
                <input type="number" id="precio" style="margin:5px 0 10px 0" placeholder="Precio">
                <label>Traslado</label>
                <input type="number" id="traslado" style="margin:5px 0 10px 0" placeholder="Traslado">
                <label>Seña</label>
                <input type="number" id="seña" id="seña" style="margin:5px 0 10px 0" placeholder="Seña">
                
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
                                $query = "SELECT * FROM entradas where id != 99";
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
                <h5>Comentarios Adicionales</h5>
                <textarea id="infoAdicional" cols="30" rows="10" maxlenght="500"></textarea>
                <div class="div-acciones">
                    <a href="tabla.php"><input type="button" id="btn-cancelar" value="Cancelar"></a>
                    <input type="submit" name="btn-agregar" id="btn-agregar" value="Agregar">
                </div>
            </div>
        </div>
    </div>

    <!--JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/seleccionar-agregar.js"></script> 

</body>

</html>

<?php } ?>