<?php
    session_start();
    $id = $_POST['cod_prod'];
    $producto = $_POST['producto'];
    $precio= $_POST['precio'];
    $cantidad=$_POST['cantidad'];
    $linea_pedido=array();
    $linea_pedido[0]=$id;
    $linea_pedido[1]=$producto;
    $linea_pedido[2]=$precio;
    $linea_pedido[3]=$cantidad;
    $_SESSION[$producto] = $linea_pedido;
    header("Location: catalogo.php");
?>