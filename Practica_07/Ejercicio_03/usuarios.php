<?php
    if(isset($_POST["usuario_nuevo"])){
        $usuario = $_POST["usuario_nuevo"];
        setcookie("usuario", $usuario, time() + (60 * 60 * 24 * 30));
    }
    else{
        if (isset($_COOKIE["usuario"])){
            $usuario = $_COOKIE["usuario"];
        }
        else{
            $usuario = "";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Menu</title>
</head>
<body>
    <div class='form-group mx-sm-3 mb-2'>
        <form class="form-inline" action="usuarios.php" method="POST">
            <div class="form-group mx-sm-3 mb-2">
            <h2>Carga de usuarios</h2>
                <label for="usuario_ant" class="sr-only">Usuario anterior</label>
                <?php
                    if($usuario == ""){
                        echo '<input type="text" readonly class="form-control-plaintext" id="usuario_ant" value="Usted aún no ha ingresado ningún usuario"';
                    }
                    else{
                        echo '<input type="text" readonly class="form-control-plaintext" id="usuario_ant" value="El último usuario ingresado fue: '.$usuario.'"';
                    }
                ?>
            </div>
            <div class="form-group mx-sm-1 mb-2">
                <label for="usuario_nuevo" class="sr-only">Usuario Nuevo</label>
                <input type="text" class="form-control" id="usuario_nuevo" name="usuario_nuevo" placeholder="Nuevo usuario">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Ingresar</button>
    </div>
</body>
</html>