<?php
    if(isset($_COOKIE["contador"])){
        $contador = $_COOKIE["contador"] + 1;
        setcookie("contador", $contador, time() + (60 * 60 * 24 * 30));
    }
    else{
        setcookie("contador", 1, time() + (60 * 60 * 24 * 30));
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
    <?php
        if($_COOKIE["contador"] == 1){
            echo '<h2>Bienvenido a mi página web, la cual usa un cookie que va a contar la cantidad de veces que la visita</h2>';
        }
        else{
            echo '<h2>Bienvenido nuevamente, es la vez número '.$_COOKIE["contador"].' que nos visita.</h2>';
        }
    ?>
    </div>
</body>
</html>