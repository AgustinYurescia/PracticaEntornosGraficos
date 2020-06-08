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
              <a class="nav-link" href="listado_pag.php">Listado Paginado</a>
            </li>
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
      if (isset(($_POST['id_ciudad']))){
        $id_ciudad = $_POST['id_ciudad'];
        $sentenciaSQL = "SELECT * FROM ciudades WHERE id='$id_ciudad'";
        $rta = mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
        $ciudad =  mysqli_fetch_assoc($rta);
      }
      $sentenciaSQL = "SELECT * FROM ciudades";
      $rta =  mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
    ?>
    <h2>Formulario de Modificación</h2>
    <form action="modificacion.php" method="POST">
      <div class='form-group'>
        <div class='form-group mx-sm-3 mb-2'>
          <label class='form-label' for='id_ciudad'> Seleccione la ciudad a modificar: </label>
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
          <button type="submit" class="btn btn-primary">Modificar</button>
        </div>
      </div>
    </form>      
    <?php
      if (isset(($_POST['id_ciudad']))){
        $id_ciudad = $_POST['id_ciudad'];
        $sentenciaSQL = "SELECT * FROM ciudades WHERE id='$id_ciudad'";
        $rta = mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
        $ciudad =  mysqli_fetch_assoc($rta);
        echo("
        <div class='form-group mx-sm-3 mb-2'>
          <form action='modificar.php' method='POST'>
            <input type='hidden' class='form-control' id='id' name='id' value=".$ciudad['id'].">
            <div class='form-row'>
              <div class='form-group col-md-6'>
                <label for='ciudad'>Ciudad</label>
                <input type='text' class='form-control' id='ciudad' name='ciudad' value=".$ciudad['ciudad'].">
              </div>
              <div class='form-group col-md-6'>
                <label for='Pais'>Pais</label>
                <input type='text' class='form-control' id='pais' name='pais' value=".$ciudad['pais'].">
              </div>
            </div>
            <div class='form-row'>
              <div class='form-group col-md-6'>
                <label for='cant_hab'>Cantidad de habitantes</label>
                <input type='text' class='form-control' id='cant_hab' name='cant_hab' value=".$ciudad['habitantes'].">
              </div>
              <div class='form-group col-md-6'>
                <label for='superficie'>Superficie</label>
                <input type='text' class='form-control' id='superficie' name='superficie' value=".$ciudad['superficie'].">
              </div>
            </div>
            <div class='form-group'>
                <label class='form-label' for='tiene_metro'> Tiene metro </label>
                <select class='form-control' id='tiene_metro' name='tiene_metro'>
                  <option selected value='1'>SI</option>
                  <option value='0'>NO</option>
                </select>
            </div>
            <button type='submit' class='btn btn-primary'>Aceptar</button>
          </form>
        </div>");
        mysqli_free_result($rta);
       }
       mysqli_close($link); 
       ?>
</body>
</html>