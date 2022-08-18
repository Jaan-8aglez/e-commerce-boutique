<?php
include "../conexion.php";

$fila= $conexion->query('select imagen from productos where id='.$_POST['id']);
$id = mysqli_fetch_row($fila);
if(file_exists('../img/product/'.$id[0])){
    unlink('../img/product/'.$id[0]);

}

$conexion->query("delete from productos where id=".$_POST['id']);
echo 'listo';
?>