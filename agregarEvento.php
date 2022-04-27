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

</head>

<body>   

    <div class="contenedor">
        <div class="nav">
            <h1>A&L Eventos Reservas</h1>
        </div>
        <div class="contenedor-divForm">
            <h4>Agregar Evento</h4>
            <form action="" method="POST">
                <h5>Detalles del Cliente</h5>
                <input type="text" id="nombreCliente" placeholder="Nombre">
                <input type="email" id="mailCliente" placeholder="Correo Electrónico">
                <input type="text" id="telefonoCliente" placeholder="Teléfono">

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
                        <input type="number" id="adultos" min="25" value="25">
                    </div>
                    <div>
                        <label for="">Niños</label>
                        <input type="number" id="niños" value="0">
                    </div>
                </div>
                <input type="text" id="localidad" placeholder="Localidad">
                <input type="text" id="direccion" placeholder="Dirección">
                <input type="number" id="precio" placeholder="Precio">
                <input type="number" id="seña" placeholder="Seña">
                <input type="radio" id="señado">
                <input type="button" value="Variedades">
                <input type="button" value="Entradas">
            </form>
        </div>
    </div>
    
</body>

</html>