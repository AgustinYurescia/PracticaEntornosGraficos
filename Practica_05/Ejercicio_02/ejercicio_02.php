<?php
    $destinatario = "agustin_yurescia@hotmail.com";
    $nombreyap = $_POST['nombreyAp'];
    $asunto = $_POST['asunto'];
    $cuerpo = $_POST['consulta'];
    $mail = $_POST['mail'];
<<<<<<< HEAD
    echo $asunto;
=======
>>>>>>> 4b777b6cbba934d6f70823a27d15d76e646d71e8
    $headers = "From: ".$nombreyap." <".$mail.">\r\n";
    mail($destinatario, $asunto, $cuerpo, $headers);
?>