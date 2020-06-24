<?php
    if(isset($_POST["tema_not"])){
        $tema_not = $_POST["tema_not"];
        setcookie("tema_noticia", $tema_not, time() + (60 * 60 * 24 * 30));
        $tema_noticia = $_POST["tema_not"];;
    }
    else{
        if (isset($_COOKIE["tema_noticia"])){
            $tema_noticia = $_COOKIE["tema_noticia"];
        }
        else{
            $tema_noticia = "ninguno";
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
    <?php
        if ($tema_noticia == "ninguno"){
    ?>
            <div class='form-group mx-sm-3 mb-2'>
                <h2>Seleccione un tema de interés para las noticias</h2>
                <form action="noticias.php" method="POST">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="politica" id="check1" name="tema_not">
                        <label class="form-check-label" for="defaultCheck1">Noticias políticas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="economica" id="check2" name="tema_not">
                        <label class="form-check-label" for="defaultCheck2">Noticias económicas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="deportiva" id="check3" name="tema_not">
                        <label class="form-check-label" for="defaultCheck2">Noticias deportivas</label>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Aceptar</button>
                </form>
            </div>
    <?php        
        }
        elseif($tema_noticia == "politica"){
            echo '<h2>Se muestran noticias sobre política</h2>
                    <a href="borrar_cookie.php">Borrar tema de interés</a>';
        }
        elseif($tema_noticia == "economica"){
            echo '<h2>Se muestran noticias sobre economía</h2>
                    <a href="borrar_cookie.php">Borrar tema de interés</a>';
        }
        elseif($tema_noticia == "deportiva"){
            echo '<h2>Se muestran noticias sobre deportes</h2>
                    <a href="borrar_cookie.php">Borrar tema de interés</a>';
        }
    ?>
</body>
</html>