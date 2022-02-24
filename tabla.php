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

    <!--JS-->
    <script src="assets/js/coloresTarjeta.js"></script>

</head>

<body>   

    <div class="contenedor">
        <div class="nav">
            <h1>A&L Eventos Reservas</h1>
        </div>
        <div class="contenedor-menu">
            <div id="menu" class="div-menu">
                <button id="btn-agregar" class="btn-opt">Agregar</button>
                <button id="btn-filtrar" class="btn-opt">Filtrar</button>
                <button id="btn-eliminar" class="btn-opt">Eliminar</button>
                <button id="btn-menu" class="btn-opt">Menú</button>
            </div>
        </div>
        <div id="separador"></div>
        <div class="contenedor-eventos">
            <?php
                $query = "select DATE_FORMAT(fecha, '%d/%m/%Y') as fecha,idReserva,localidad,cantAdultos,cantChicos,direccion,horario,hora,precio,seña,nombre,mail,telefono from reserva r inner join cliente c on r.idCliente = c.idCliente";
                $envio = $conexion->query($query);
                while($row=$envio->fetch_assoc()){
            ?>
            <div id="tarjeta-evento-<?php echo $row['idReserva']?>" class="contenedor-tarjeta-evento">
                <div class="tarjeta-evento">
                    <div class="tarjeta-evento-cartel">
                        <h3>
                            <?php echo $row['fecha']; ?>
                        </h3>
                    </div>
                    <div class="tarjeta-evento-info">
                        <p>
                            Localidad: <?php echo $row['localidad']; ?> <br>
                            Adultos: <?php echo $row['cantAdultos']; ?> <br>
                            Niños: <?php echo $row['cantChicos']; ?> <br>
                            Dirección: <?php echo $row['direccion']; ?> <br>
                            Horario: <?php echo $row['horario']; ?> <br>
                            Hora: <?php echo $row['hora']; ?> <br>
                        </p>
                    </div>
                </div>
                <div id="tarjeta-evento-infoDesplegable">
                    <div class="tarjeta-evento-infoCliente">
                        <h5>Cliente</h5>
                        <p>
                            Nombre: <?php echo $row['nombre']; ?> <br>
                            Mail: <?php echo $row['mail']; ?> <br>
                            Telefono: <?php echo $row['telefono']; ?>
                        </p>
                    </div>
                    <div class="tarjeta-evento-infoPrecios">
                        <h5>Precios</h5>
                        <p>
                            Precio: $<?php echo $row['precio']; ?> <br>
                            Seña: <span id="seña-evento-<?php echo $row['idReserva']?>"><?php echo $row['seña']; ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <script>
                definirColorTarjeta('<?php echo $row['fecha']; ?>','tarjeta-evento-<?php echo $row['idReserva']?>');
                definirColorSeña('seña-evento-<?php echo $row['idReserva']?>');
            </script>
            <?php } ?>
        </div>
    </div>

    <script src="assets/js/menu.js"></script>
    <script src="assets/js/abrirTarjetas.js"></script>
    
</body>

</html>