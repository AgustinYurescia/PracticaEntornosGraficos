<?php
    session_start();
    extract($_REQUEST);
    $_SESSION["user"] = $user;
    $_SESSION["password"] = $password;
    header("refresh:5; url=mostrar_datos.php");
    $mensaje = "Las variables de sesión han sido creadas, redireccionando...";
    echo $mensaje;
?>