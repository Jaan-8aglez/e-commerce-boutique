<?php
include "../conexion.php";

if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['inventario'])
&& isset($_POST['categoria']) && isset($_POST['talla']) && isset($_POST['color'])){

    $carpeta="../img/product/";
    $nombre= $_FILES['imagen']['name'];
    
    //imagen.jpg explode identifica la extencion de la imagen 
    $temp= explode('.',$nombre);
    $extension= end($temp);
    $nombreFinal= time().'..'.$extension;   
    if($extension== 'JPG' || $extension == 'PNG'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta. $nombreFinal)){
            $conexion->query("insert into productos (nombre,descripcion,precio,imagen,inventario,id_categoria,talla,color)
              values (
                  '".$_POST['nombre']."',
                  '".$_POST['descripcion']."',
                  ".$_POST['precio'].",
                  '$nombreFinal',
                  '".$_POST['inventario']."',
                  ".$_POST['categoria'].",
                  '".$_POST['talla']."',
                  '".$_POST['color']."'
              )
            ")or die($conexion->error);
            header("Location: productos.php?success");

        }else{
            header("Location: productos.php?error=Error, no se cargo la imagen");

        }

    }else{
        header("Location: productos.php?error=Favor de subir una imagen valida");

    }

}else{
    header("Location: productos.php?error=Favor de llenar todos los campos");
}

?>