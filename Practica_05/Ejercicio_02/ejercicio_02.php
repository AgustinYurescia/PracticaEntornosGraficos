<?php
    $destinatario = "agustin_yurescia@hotmail.com";
    $nombreyap = $_POST['nombreyAp'];
    $asunto = $_POST['asunto'];
    $cuerpo = $_POST['consulta'];
    $mail = $_POST['mail'];
    $headers = "From: ".$nombreyap." <".$mail.">\r\n";
    mail($destinatario, $asunto, $cuerpo, $headers);
?>