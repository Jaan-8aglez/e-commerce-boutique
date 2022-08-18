<?php
session_start();
include 'conexion.php';

if(!isset($_SESSION['carrito'])){
  header('Location:./index.php'); 
}

$arreglo= $_SESSION['carrito'];
$total= 0;
for($i=0; $i<count($arreglo); $i++){
  $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}

$password= "";
if(isset($_POST['password'])){
  if($_POST['password']!=""){
     $password = $_POST['password'];
  }
}
$conexion->query("insert into usuario (nombre,telefono,email,password) 
values ('".$_POST['nombre']." ".$_POST['apellido']."',
        '".$_POST['telefono']."',
        '".$_POST['email']."',
        '".$password."'

      )")or die($conexion->error);
  $id_usuario= $conexion->insert_id;    
$fecha = date('Y-m-d h:m:s');
$conexion -> query("insert into ventas (id_usuario,total,fecha) values ($id_usuario,$total,'$fecha') ") or die ($conexion->error);
$id_venta = $conexion ->insert_id;
for($i=0; $i<count($arreglo); $i++){
  $conexion -> query("insert into productos_venta (id_venta,id_producto,cantidad,precio,subtotal) 
  values($id_venta,
  ".$arreglo[$i]['Id'].",
  ".$arreglo[$i]['Cantidad'].",
  ".$arreglo[$i]['Precio'].",
  ".$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']."
  ) ")or die($conexion->error);
}
$conexion->query("insert into facturacion (empresa,direccion,estado,cp,id_venta) 
values ('".$_POST['empresa']."',
'".$_POST['direccion']."',
'".$_POST['estado']."',
'".$_POST['cp']."',
$id_venta

)")or die($conexion->error);

unset($_SESSION['carrito']);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <title>TIENDA EN LÍNEA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" href="css/aos.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    
  </head>
  <body>
  
  <div class="site-wrap">
   <!-- Offcanvas Menu Begin -->
   <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="cart.php"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="./login.html">Login</a>
            <a href="./login.html">Registrate</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo-martina.png" class="logo" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.html">Inicio</a></li>
                            <li><a href="#">Ropa</a></li>
                            <li><a href="#">Accesorios</a></li>
                            <li><a href="catalogo.php">Tienda</a></li>
                            <li><a href="#">Rebajas</a></li>
                            <li><a href="./contact.html">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="./login.html">Login</a>
                            <a href="./login.html">Registro</a>
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">5</div>
                            </a></li>
                            <li><a href="cart.php"><span class="icon_bag_alt"></span>
                                <div class="tip"><?php
                                    if(isset($_SESSION['carrito'])){
                                      echo count($_SESSION['carrito']);

                                    }else{
                                      echo 0;
                                    }
                                ?>
                                </div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Gracias por tu compra!</h2>
            <p class="lead mb-5">Su pedido se completó con éxito.</p>
            <p><a href="index.html" class="btn btn-sm btn-selection">Regresar a la tienda</a></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="img/logo-martina.png" alt=""></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    cilisis.</p>
                    <div class="footer__payment">
                        <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Menú</h6>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Tienda</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Cuenta</h6>
                    <ul>
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Favoritos</a></li>
                        <li><a href="#">Carrito</a></li>
                        <li><a href="#">Pedidos</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>NEWSLETTER</h6>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribete</button>
                    </form>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
  
                <div class="footer__copyright__text">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>Derechos reservados | Janet Ochoa <i class="fa fa-heart" aria-hidden="true"></i></p>
                </div>
                
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>