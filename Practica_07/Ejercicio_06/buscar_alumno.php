<?php
    include("conexion.inc");
    $mail = $_POST['mail'];
    $sentenciaSQL = "SELECT * FROM alumnos WHERE mail = '$mail'";
    $rta =  mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
    $alumno =  mysqli_fetch_assoc($rta);
    if ($alumno){
        session_start();
        $_SESSION["alumno"] = $alumno['nombre'];
        header("refresh:5; url=bienvenida.php");
        $mensaje = "Alumno encontrado, ingresando...";
        echo $mensaje;}
?>