<?php
session_start();
include "../conexion.php";

$resultado = $conexion->query("select productos.*, categorias.nombre as catego
 from productos inner join categorias on productos.id_categoria = categorias.id  order by id ASC")or die ($conexion->error);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Boutique</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./dashboard/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./dashboard/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./dashboard/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php include "./layouts/header.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus mr-2"></i>Insertar Producto</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
          if(isset($_GET['error'])){
        ?>
        <div class="alert alert-danger" role="alert">
         <?php echo $_GET['error']; ?>
         <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  } ?>

        <?php
          if(isset($_GET['success'])){
        ?>
        <div class="alert alert-success" role="alert">
           Se ha insertado correctamente
         <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  } ?>

        <table class="table" >
          <thead>
            <tr>
             <th>Id</th>
             <th>Nombre</th>
             <th>Descripci??n</th>
             <th>Precio</th>
             <th>Imagen</th>
             <th>Inventario</th>
             <th>Categoria</th>
             <th>Talla</th>
             <th>Color</th>
             <th>Editar</th>
             <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
               <?php
                 while($fila= mysqli_fetch_array($resultado)){
               ?>
            <tr>

             <td><?php echo $fila['id'];?></td>
             <td><?php echo $fila['nombre'];?></td>
             <td><?php echo $fila['descripcion'];?></td>
             <td>$<?php echo $fila['precio'];?></td>
             <td><img src="../img/product/<?php echo $fila['imagen'];?>" width="40px" height="50px" alt="" ></td>
             <td><?php echo $fila['inventario'];?></td>
             <td><?php echo $fila['catego'];?></td>
             <td><?php echo $fila['talla'];?></td>
             <td><?php echo $fila['color'];?></td>

             <td><button class="btn btn-success btnEditar" 
             data-id="<?php echo $fila['id'];?>"
             data-nombre="<?php echo $fila['nombre'];?>"
             data-descripcion="<?php echo $fila['descripcion'];?>"
             data-precio="<?php echo $fila['precio'];?>"
             data-inventario="<?php echo $fila['inventario'];?>"
             data-categoria="<?php echo $fila['id_categoria'];?>"
             data-talla="<?php echo $fila['talla'];?>"
             data-color="<?php echo $fila['color'];?>"
             data-toggle="modal" data-target="#modalEditar">
             <i class="fa fa-edit"></i></button></td>

             <td><button class="btn btn-danger btnEliminar" 
             data-id="<?php echo $fila['id'];?>"
             data-toggle="modal" data-target="#modalEliminar">
             <i class="fa fa-trash"></i></button></td>

            </tr>
               <?php } ?>

          </tbody>
        </table>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <form action="./insertarproducto.php" method="POST" enctype="multipart/form-data" > 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar Producto</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nombre" >Nombre</label> 
          <input type="text" name="nombre" placeholder="nombre" id="nombre" class="form-control" required> 
        </div>
        <div class="form-group">
          <label for="descripcion" >Descripci??n</label> 
          <input type="text" name="descripcion" placeholder="descripcion" id="descripcion" class="form-control" required> 
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label for="precio" >Precio</label> 
          <input type="number" min="0" name="precio" placeholder="precio" id="precio" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label for="inventario" >Inventario</label> 
          <input type="number" min="0" name="inventario" placeholder="inventario" id="inventario" class="form-control" required> 
        </div>
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label for="categoria" >Categoria</label> 
          <select name="categoria" id="categoria" class="form-control" required>
             <?php
             $res= $conexion->query("select * from categorias");
               while($fila=mysqli_fetch_array($res)){
                 echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
               }
             ?>
          </select>
        </div>
        <div class="form-group col-6">
          <label for="talla" >Tallas</label> 
          <input type="text" name="talla" placeholder="tallas" id="talla" class="form-control" required>
        </div>
        </div>
        <div class="form-group">
          <label for="imagen" >Imagen</label> 
          <input type="file" name="imagen" id="imagen" class="form-control" required> 
        </div>
        <div class="form-group">
          <label for="color" >Color</label> 
          <input type="text" name="color" placeholder="color" id="color" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

  <!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEliminarLabel">Eliminar Producto</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ??Desea eliminar el producto?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
      </div>
    </div>
  </div>
</div>
  <!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <form action="./editarproducto.php" method="POST" enctype="multipart/form-data" > 
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar Producto</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="idEdit" name="id" class="form-control" > 
        <div class="form-group">
          <label for="nombreEdit" >Nombre</label> 
          <input type="text" name="nombre" placeholder="nombre" id="nombreEdit" class="form-control" required> 
        </div>
        <div class="form-group">
          <label for="descripcionEdit" >Descripci??n</label> 
          <input type="text" name="descripcion" placeholder="descripcion" id="descripcionEdit" class="form-control" required> 
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label for="precioEdit" >Precio</label> 
          <input type="number" min="0" name="precio" placeholder="precio" id="precioEdit" class="form-control" required> 
        </div>
        <div class="form-group col-6">
          <label for="inventarioEdit" >Inventario</label> 
          <input type="number" min="0" name="inventario" placeholder="inventario" id="inventarioEdit" class="form-control" required> 
        </div>
        </div>
        <div class="row">
        <div class="form-group col-6">
          <label for="categoriaEdit" >Categoria</label> 
          <select name="categoria" id="categoriaEdit" class="form-control" required>
             <?php
             $res= $conexion->query("select * from categorias");
               while($fila=mysqli_fetch_array($res)){
                 echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
               }
             ?>
          </select>
        </div>
        <div class="form-group col-6">
          <label for="tallaEdit" >Tallas</label> 
          <input type="text" name="talla" placeholder="tallas" id="tallaEdit" class="form-control" required>
        </div>
        </div>
        <div class="form-group">
          <label for="imagen" >Imagen</label> 
          <input type="file" name="imagen" id="imagen" class="form-control"> 
        </div>
        <div class="form-group">
          <label for="colorEdit" >Color</label> 
          <input type="text" name="color" placeholder="color" id="colorEdit" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary editar">Actualizar</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <?php include "./layouts/footer.php";?>
</div>
<!-- jQuery -->
<script src="./dashboard/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="./dashboard/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="./dashboard/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="./dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="./dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="./dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./dashboard/plugins/moment/moment.min.js"></script>
<script src="./dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="./dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="./dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="./dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./dashboard/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dashboard/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="./dashboard/dist/js/pages/dashboard.js"></script>

<script>
$(document).ready(function(){
  var idEliminar= -1;
  var idEditar= -1;
  var fila;
  $(".btnEliminar").click(function(){
    idEliminar=$(this).data('id');
    fila=$(this).parent('td').parent('tr');
  });
  $(".eliminar").click(function(){
    $.ajax({
      url: 'eliminarproducto.php',
      method: 'POST',
      data:{
        id:idEliminar
      }
    }).done(function(res){
      alert(res);
      $(fila).fadeOut(1000);
    });
  });
  $(".btnEditar").click(function(){
    idEditar=$(this).data('id');
    var nombre=$(this).data('nombre');
    var descripcion=$(this).data('descripcion');
    var precio=$(this).data('precio');
    var inventario=$(this).data('inventario');
    var categoria=$(this).data('categoria');
    var talla=$(this).data('talla');
    var color=$(this).data('color');
    $("#nombreEdit").val(nombre);
    $("#descripcionEdit").val(descripcion);
    $("#precioEdit").val(precio);
    $("#inventarioEdit").val(inventario);
    $("#categoriaEdit").val(categoria);
    $("#tallaEdit").val(talla);
    $("#colorEdit").val(color);
    $("#idEdit").val(idEditar);

});

});
</script>

</body>
</html>
