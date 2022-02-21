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
        <div class="div-boton-opciones">
            <button class="boton-opciones">Menú</button>
        </div>
        <div class="contenedor-eventos">
            
            <script>
                const definirColorTarjeta = (fecha, id)=>{
                    const tarjeta = document.getElementById(id);
                    const actual = new Date().toLocaleDateString();


/*
                    if (fecha > actual) tarjeta.style.backgroundColor = 'red'
                    else if (fecha < actual) tarjeta.style.backgroundColor = 'green'
                    else tarjeta.style.backgroundColor = 'blue';*/
                }
            </script>

            <?php
                $query = "SELECT DATE_FORMAT(fecha, '%d/%m/%Y') as fecha,idReserva,localidad,cantAdultos,cantChicos,direccion,horario,hora,precio from reserva";
                $envio = $conexion->query($query);
                while($row=$envio->fetch_assoc()){
            ?>
            <div id="tarjeta-evento-<?php echo $row['idReserva']?>" class="tarjeta-evento">
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
                        Precio: <?php echo $row['precio']; ?> <br>
                    </p>
                </div>
            </div>
            <script>
                
                definirColorTarjeta('<?php echo $row['fecha']; ?>','tarjeta-evento-<?php echo $row['idReserva']?>')
            </script>
            <?php } ?>
        </div>
    </div>

    <!--<script src="assets/js/main.js"></script>-->

</body>

</html>