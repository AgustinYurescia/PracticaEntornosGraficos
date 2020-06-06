<?php
    $destinatario = $_POST['mail_destino'];
    $nombreyap = $_POST['nombreyap'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje']
    $mail_or = $_POST['mail_origen'];
    $cuerpo = '
        <html>
            <head>
                <title>Recomendación</title>
            </head>
            <body>
                <p><b>Hola</b></p>
                <p><b><?php $mensaje ?>
                <a href='wwww.paginarecomendada.com'>Link</a>
            </body>
        </html>    
        ';
    $headers = "MIME-Version:1.0\r\n";
    $headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
    $headers = "From: ".$nombreyap." <".$mail_or.">\r\n";
    mail($destinatario, $asunto, $cuerpo, $headers);
?>