<?php
    $host = "localhost";
    $user = "root";
    $password = "java2019";
    $link = mysqli_connect($host, $user, $password) or die ("Problemas de conexión a la base dedatos");
    mysqli_select_db($link, "prueba");
?>