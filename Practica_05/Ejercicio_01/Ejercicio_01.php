<?php
    $destinatario = "agustin_yurescia@hotmail.com";
    $asunto = "Ejercicio 1 de P5 PHP";
    $cuerpo = 
        '
            <html>
                <head>
                    <title>Ejercicio 1 de Practica 5 PHP</title>
                </head>
                <body>
                    <h1>Este es un mail de prueba para PHP</h1>
                    <p><b>Hola Mundo!</b></p>
                </body>
            </html>    
        ';
    $headers = "MIME-Version:1.0\r\n";
    $headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
    $headers .= "From: Agustin Yurescia <vinotecagatti@gmail.com>\r\n";
    mail($destinatario, $asunto, $cuerpo, $headers);
?>