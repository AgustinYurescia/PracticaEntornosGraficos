<?php
    if(isset($_POST["estilo"])){
        $estilo = $_POST["estilo"];
        setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 30));
    }
    else{
        if (isset($_COOKIE["estilo"])){
            $estilo = $_COOKIE["estilo"];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php
        if (isset($estilo)){
            echo ' <link rel="stylesheet" type="text/css" href="./'.$estilo.'.css">';
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Menu</title>
</head>
<body>
    <div class='form-group mx-sm-3 mb-2'>
        <h2>Seleccionar estilo</h2>
        <form class="form-inline" action="cambiar_estilo.php" method="POST">
            <select class="custom-select my-1 mr-sm-2" id="estilo" name="estilo">
                <option selected value="azul">Fondo azul</option>
                <option value="negro">Fondo negro</option>
                <option value="gris">Fondo gris</option>
            </select>
            <button type="submit" class="btn btn-primary my-1">Aceptar</button>
        </form>
    </div>
</body>
</html>