<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Buscardor de canciones</title>
</head>
<body>
    <?php
        include("conexion.inc");
        $cancion = $_POST['cancion'];
        $sentenciaSQL = "SELECT * FROM buscador WHERE cancion LIKE '%$cancion%'";
        $rta =  mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
        if (mysqli_num_rows($rta) == "0"){
            echo'
                <div class="form-group mx-sm-3 mb-2">
                    <div class="alert alert-danger" role="alert">No se ha encontrado ninguna canción - <a href="buscador.html" class="alert-link">Volver al buscardor</a></div>
                </div>
                ';
        }
        else
        {
    ?>
            <h2>Canciones encontradas</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Cancion</th>
                        <th scope="col">Artista</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($c = mysqli_fetch_array($rta)){
                            echo("
                                <tr>
                                    <td>".$c['1']."</td>
                                    <td>".$c['2']."</td>
                                </tr>");
                        }
        }
        mysqli_free_result($rta);
        mysqli_close($link);
      ?>
  </tbody>
</table>
</body>
</html>

