<body>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title> Producto </title>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="catalogo.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="catalogo.php">Listado de productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="carrito.php">Carrito<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
    </nav>
    <?php
        include("conexion.inc");
        $codigo = $_GET["cod_prod"];
        $sentenciaSQL = "SELECT * FROM catalogo where id='$codigo'";
        $rta =  mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
        $prod = mysqli_fetch_assoc($rta);
        echo '<h2>'.$prod['producto'].' - Precio: '.$prod["precio"].'</h2>';
    ?>
    <form class="form-inline" action="agregar.php" method="POST">
  	  <div class="form-group mb-2">
    		<label for="cantidad" class="sr-only">Cantidad</label>
        <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
        <?php
        echo '<input type="hidden" id="cod_prod" name="cod_prod" value="'.$prod['id'].'">';
        echo '<input type="hidden" id="producto" name="producto" value="'.$prod['producto'].'">';
        echo '<input type="hidden" id="precio" name="precio" value="'.$prod['precio'].'">';
        ?>
  		</div>
  		<button type="submit" class="btn btn-primary mb-2">Agregar al carrito</button>
		</form>
</body>
</html>