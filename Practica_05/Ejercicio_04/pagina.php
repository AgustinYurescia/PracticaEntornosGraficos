<?php
    session_start();
?>
<html>
<body>
    <?php
        if (!isset($_SESSION["contador"])){
            $_SESSION["contador"] = 1;
        }else{
            $_SESSION["contador"]++;
        } 
    ?>
    <h1>Hola a mi página web</h1>
    <a href= "cantidad_visitas.php">Ver la cantidad de veces que la visitaste</a>
</body>
</html>