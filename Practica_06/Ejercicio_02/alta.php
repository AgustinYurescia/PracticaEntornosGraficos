<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Alta Ciudad</title>
</head>
<body>
    <?php
        include("conexion.inc");
        $ciudad = $_POST['ciudad'];
        $pais = $_POST['pais'];
        $cant_hab = $_POST['cant_hab'];
        $superficie = $_POST['superficie'];
        if (isset(($_POST['tiene_metro']))){
            $tiene_metro = '0';
        }
        else{
            $tiene_metro='1';
        }

        $sentenciaSQL = "SELECT id FROM ciudades WHERE ciudad = '$ciudad' AND pais = '$pais'";
        $rta =  mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
        $row_encontrada =  mysqli_fetch_assoc($rta);
        if ($row_encontrada){
            echo("<div class='alert alert-danger' role='alert'>¡La ciudad ya existe! - <a href='alta.html' class='alert-link'>Volver a intentarlo</a></div>");
        }  
        else{
            $sentenciaSQL = "INSERT INTO ciudades(ciudad, pais, habitantes, superficie, tieneMetro) values('$ciudad', '$pais', '$cant_hab', '$superficie', '$tiene_metro')";
            mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
            echo("<div class='alert alert-success' role='alert'>¡La ciudad fue registrada! - <a href='home.html' class='alert-link'>Volver a inicio</a></div>");
            mysqli_free_result($rta);
        }
        mysqli_close($link);
    ?>
</body>
</html>