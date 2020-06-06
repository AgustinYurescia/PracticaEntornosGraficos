<?php
    session_start();
?>
<html>
<body>
    <h2>
        <?php
            echo "Has visitado " . ($_SESSION["contador"]) . " veces mi página web";
        ?>
    </h2>
    <br>
    <br>
    <a href="cuenta.php">Volver</a>
</body>
</html>