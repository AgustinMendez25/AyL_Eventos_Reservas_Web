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
    <link rel="stylesheet" href="assets/css/menu.css">

    <!--JS-->
    <script src="assets/js/coloresTarjeta.js"></script>

</head>

<body>   

    <div class="contenedor">
        <div class="nav">
            <a href="index.php"><h1>A&L Eventos Reservas</h1></a>
        </div>
        <div class="contenedor-menu">
            <div id="menu" class="div-menu">
                <a href="index.php">Inicio</a>
                <a href="agregarEvento.php">Agregar</a>
                <button id="btn-filtrar" class="btn-opt">Filtrar</button>
                <button id="btn-eliminar" class="btn-opt">Eliminar</button>
                <button id="btn-menu" class="btn-opt">Menú</button>
            </div>
            <!--Modal FILTROS-->
            <div class="modal" id="modalFiltros">
                <div class="modal-caja" id="modalFiltros-caja">
                    <div class="header">
                        <h4>Filtros</h4>
                        <label id="cerrarModalFiltros">X</label>
                    </div>
                    <div class="contenido">
                        <form method="post">
                            <input type="text" name="filtro" id="filtro" value="1" style="display:none">
                            <button id="fPendientes" name="fPendientes" type="submit">Pendientes</button>
                            <button id="fRealizados" name="fRealizados" type="submit">Realizados</button>
                            <button id="fTodos" name="fTodos" type="submit">Todos</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="cancelarEliminar">
            <span>Cancelar</span>
        </div>
        <div id="separador" style="height: 54px;"></div>
        <div class="contenedor-eventos">
            <?php
                $where = " WHERE fecha > CURRENT_DATE";
                if(isset($_POST['fPendientes']) || isset($_POST['fRealizados']) || isset($_POST['fTodos'])){
                    switch ($_POST['filtro']) {
                        case '1':
                            $where = " WHERE fecha > CURRENT_DATE";
                            break;
                        case '2':
                            $where = " WHERE fecha < CURRENT_DATE";
                            break;
                        case '3':
                            $where = "";
                            break;
                    }
                }
                $query = "select fecha,idReserva,localidad,cantAdultos,cantChicos,direccion,horario,hora,precio,seña,nombre,mail,telefono from reserva r inner join cliente c on r.idCliente = c.idCliente " . $where . " order by fecha";
                $envio = $conexion->query($query);
                if ($envio->num_rows == 0){
                    echo '
                        <div class="div-noEventos">
                            <h4>No hay eventos pendientes</h4>
                        </div>
                    ';
                }
                while($row=$envio->fetch_assoc()){
                    $idRes = $row['idReserva'];
                    $fecha = explode("-", $row['fecha']);
                    $fechaFinal = $fecha[2]."/".$fecha[1]."/".$fecha[0];
            ?>
            <div id="tarjeta-evento-<?php echo $idRes?>" class="contenedor-tarjeta-evento">
                <div class="tarjeta-evento">
                    <span class="eliminarTarjeta" value="<?php echo $idRes?>">X</span>
                    <h3 class="tarjeta-evento-h3"><?php echo $row['localidad']; ?></h3>
                    <div class="tarjeta-evento-contenido">
                        <div class="tarjeta-evento-cartel">
                            <h3>
                                <?php echo $fechaFinal; ?>
                            </h3>
                        </div>
                        <div class="tarjeta-evento-info">
                            <ul>
                                <li>Adultos: <?php echo $row['cantAdultos']; ?></li>
                                <li>Niños: <?php echo $row['cantChicos']; ?></li>
                                <li>Dirección: <?php echo $row['direccion']; ?></li>
                                <li>Horario: <?php echo $row['horario']; ?></li>
                                <li>Hora: <?php echo $row['hora']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="contenedor-infoDesplegable">
                    <div id="tarjeta-evento-infoDesplegable">
                        <div class="tarjeta-evento-infoCliente">
                            <h5>Cliente</h5>
                            <ul id="ul-cliente-<?php echo $idRes?>">
                                <li>Nombre: <?php echo $row['nombre']; ?></li>
                                <li>Telefono: <?php echo $row['telefono']; ?></li>
                                <li>Mail: <?php echo $row['mail']; ?></li>
                            </ul>
                        </div>
                        <div class="tarjeta-evento-infoPrecios">
                            <h5>Precios</h5>
                            <ul>
                                <li>Precio: $<?php echo $row['precio']; ?></li>
                                <li>Seña: <span id="seña-evento-<?php echo $idRes?>"><?php echo $row['seña']; ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                definirColorTarjeta('<?php echo $row['fecha']; ?>','tarjeta-evento-<?php echo $idRes?>');
                definirColorSeña('seña-evento-<?php echo $idRes?>');
                setearDatosNulos('ul-cliente-<?php echo $idRes?>');
            </script>
            <?php } ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="assets/js/menu.js"></script>
    <script src="assets/js/abrirTarjetas.js"></script>
    <script src="assets/js/filtros.js"></script>
    
</body>

</html>