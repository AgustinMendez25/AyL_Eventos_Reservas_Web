<?php
    if (isset($_POST["contraseña_admin"])) {
        $contraseña = $_POST['contraseña_admin'];
        if ($contraseña == "12345"){
            session_start();
            $_SESSION['contraseña_admin'] = $contraseña;
            header("Location:../../index.php");
        }
        else{
            header("Location:../../ingreso.php");
        }
    }
?>