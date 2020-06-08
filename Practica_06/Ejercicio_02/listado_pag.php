<body>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title> Listado completo </title>
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
</body>
  <?php
    include("conexion.inc");
    $Cant_por_Pag = 10;
    $pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;
    if (!$pagina) {
        $inicio = 0;
        $pagina=1;
    }
    else {
        $inicio = ($pagina - 1) * $Cant_por_Pag;
    }
    $sentenciaSQL = "SELECT * FROM ciudades";
    $rta =  mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
    $total_registros=mysqli_num_rows($rta);
    $total_paginas = ceil($total_registros/ $Cant_por_Pag);
    $sentenciaSQL = "SELECT * FROM ciudades"." limit ". $inicio.",".$Cant_por_Pag;
    $rta = mysqli_query($link, $sentenciaSQL) or die (mysqli_error($link));
    $total_registros=mysqli_num_rows($rta);
  ?>
  <h2>Listado Paginado</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Ciudad</th>
        <th scope="col">Pais</th>
        <th scope="col">Cantidad de Habitantes</th>
        <th scope="col">Superficie en M2</th>
        <th scope="col">Tiene Metro(0/1)</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($c = mysqli_fetch_array($rta)){
        echo("
        <tr>
          <td>".$c['ciudad']."</td>
          <td>".$c['pais']."</td>
          <td>".$c['habitantes']."</td>
          <td>".$c['superficie']."</td>
          <td>".$c['tieneMetro']."</td>
        </tr>");}
        mysqli_free_result($rta);
        mysqli_close($link);
      ?>
    </tbody>
  </table>
  <?php
    if ($total_paginas > 1){
    for ($i=1;$i<=$total_paginas;$i++){
        if ($pagina == $i)
            echo $pagina . " ";
        else
            echo "<a href='Listado_pag.php?pagina=" . $i ."'>" . $i . "</a> ";}}
  ?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center"><a href="home.php">Volver al menu</a></p>
</body>
</html>