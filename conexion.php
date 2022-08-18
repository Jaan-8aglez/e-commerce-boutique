<?php
    $servidor="localhost";
    $bd="carrito";
    $usuario="root";
    $password="";

    $conexion = new mysqli($servidor,$usuario,$password,$bd);
    if($conexion -> connect_error) {
        die("Conexion fallida");
    }
?>
