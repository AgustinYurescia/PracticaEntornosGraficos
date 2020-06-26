<?php
    session_start()
?>
<body>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title> Carrito </title>
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
              <a class="nav-link" href="carrito.php">Carrito</a>
            </li>
          </ul>
        </div>
    </nav>
    <h2>Carrito</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre del producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $total = 0;
            foreach ($_SESSION as $linea) {
                echo'
                    <tr>
                        <td>'.$linea[1].'</td>
                        <td>'.$linea[3].'</td>
                        <td>'.$linea[2].'</td>
                        <td>'.$linea[3]*$linea[2].'</td>
                    </tr>';
                $total = $total + $linea[3]*$linea[2];
            }
        ?>
        </tbody>
    </table>
    <?php
        echo '<h5>Total: $'.$total.'</h5>';
    ?>
    <form action="borrar_carrito.php">
        <?php
            echo '<button type="submit" class="btn btn-primary mb-2">Borrar carrito</button>'
        ?>
    </form>
</body>
</html>