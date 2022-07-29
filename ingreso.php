<?php
	session_start();

    include ("conexion.php");

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
    <link rel="stylesheet" href="assets/css/ingreso.css">

</head>

<body class="bodyMensajes">
    <!--------------------VERIFICACION POR SI YA INICIO SESION---------------------->    

    <?php
        if ((!empty($_SESSION['contraseña_admin']) && ($_SESSION['contraseña_admin'] == "12345"))){
    ?>
    
    <div class="caja-mensaje">
        <div>
            <h2>Ya has iniciado sesion</h1>
            <div class="contenido-mensaje">
                <a href='index.php'>Volver al sitio</a>
                <br><br>
                <a href='assets/procesamiento/cerrarSesion.php'>Cerrar Sesion de Administrador</a>
            </div>
        </div>
    </div>

    <?php
        }
        else{
    ?>
    
    <!--------------------------INICIO ADMIN-------------------------->

    <div class="caja-mensaje">
        <div class="contenedor-divForm contIngreso">
            <form method="post" action="assets/procesamiento/procesarLogin.php">
                <h2>Iniciar Sesión</h2>
                <div class="form-group">
                    <label>Ingrese la contraseña</label>
                    <input type="password" name="contraseña_admin" placeholder="Contraseña" required="">
                </div>
                <div>
                    <button type="submit">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
    
</body>

</html>

<?php
    }
?>