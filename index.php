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
        <div class="logo-div">
            <img src="assets/img/Logo.png">
        </div>
        <div class="contenido">
            <div class="div-tabla">
                <a href="tabla.php"><button class="boton">Tabla de Eventos</button></a>
            </div>
            <div class="div-consulta">
                <form method="POST">
                    <input class="boton" id="fechaEvento" type="date">
                    <input class="boton" type="button" id="btnConsultar" value="Consultar">
                </form>
            </div>
            <!--Modal EVENTOS-->
            <div class="modal" id="modalEventos">
                <div class="modal-caja" id="modalEventos-caja">
                    <div class="header">
                        <h4 id="headerTexto">Eventos</h4>
                        <label id="cerrarModalEventos">X</label>
                    </div>
                    <div class="contenido" id="contenidoEventos">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="assets/js/consultarFecha.js"></script>

</body>
</html>