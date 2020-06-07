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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="alta.html">Alta <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="baja.php">Baja</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="modificacion.php">Modificación</a>
            </li>
          </ul>
        </div>
    </nav>
    <?php
      include("conexion.inc");
      $sentenciaSQL = "SELECT * FROM ciudades";
      $rta =  mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
    ?>
    <form action="realizar_baja.php" method="POST">
      <div class='form-group'>
        <div class='form-group mx-sm-3 mb-2'>
          <label class='form-label' for='id_ciudad'> Seleccione la ciudad a eliminar: </label>
          <select class="form-control" id="id_ciudad" name="id_ciudad">
          <?php echo("<option selected>".$ciudad['ciudad']."</option>");?>
        <?php
          while ($r = mysqli_fetch_array($rta)){
            echo("<option value=".$r['id'].">".$r['ciudad']."</option>");
          }  
        mysqli_free_result($rta);        
        ?>
          </select>
        </div>
        <div class='form-group mx-sm-3 mb-2'>
          <button type="submit" class="btn btn-primary">Eliminar</button>
        </div>
      </div>
    </form>      
</body>
</html>