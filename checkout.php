<?php
session_start();
if(!isset($_SESSION['carrito'])){
  header('Location:./index.php');

}
$arreglo= $_SESSION['carrito'];

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TIENDA EN LÍNEA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
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
  <script src="https://www.paypal.com/sdk/js?client-id=AcXC2TmS9VxWBffQHKNi4o8sEDwAQWHLxloQziTVlOVhmak7_bFLp72jI3xYZr9L2x3SJMLlea-b6-ZL&currency=MXN"> // Replace YOUR_CLIENT_ID with your sandbox client ID
    </script>
  
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
                <div class="tip">0</div>
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
    <form action="./thankyou.php" method="POST" >

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
               ¿Eres Cliente?<a href="#">Haga clic aquí</a> para ingresar
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Facturación</h2>
            <div class="p-3 p-lg-5 border">
              
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="nombre" class="text-black">Nombre: <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="col-md-6">
                  <label for="apellido" class="text-black">Apellidos: <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="apellido" name="apellido">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="empresa" class="text-black">Nombre empresa: </label>
                  <input type="text" class="form-control" id="empresa" name="empresa">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="direccion" class="text-black">Dirección: <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Calles,entre calles">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="estado" class="text-black">Estado/Ciudad: <span class="text-danger">*</span></label>
                  <select id="estado" class="form-control" name="estado">
                    <option value="1">Selecciona el estado</option>    
                    <option value="2">Guadalajara</option>    
                    <option value="3">México</option>    
                    <option value="4">Distrito Federal</option>    
                    <option value="5">Hidalgo</option>    
                    <option value="6">Nuevo León</option>    
                    <option value="7">Campeche</option>    
                    <option value="8">Guerrero</option>    
                    <option value="9">Querétaro</option>    
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="cp" class="text-black">Código Postal:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="cp" name="cp" placeholder="C.P">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="email" class="text-black">Correo eléctronico:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6">
                  <label for="telefono" class="text-black">Teléfono:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="cuenta" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="cuenta"> Ya tienes cuenta?</label>
                <div class="collapse" id="cuenta">
                  <div class="py-2">
                    <p class="mb-3">Cree una cuenta ingresando la información a continuación. Si es un cliente recurrente, inicie sesión en la parte superior de la página.</p>
                    <div class="form-group">
                      <label for="password" class="text-black">Contraseña de la cuenta</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="notas" class="text-black">Notas de compra</label>
                <textarea name="notas" id="notas" cols="30" rows="5" class="form-control" placeholder="Escribe tus notas aqui"></textarea>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Tu pedido</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Producto</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                    <?php 
                      $total= 0;
                      for($i=0; $i<count($arreglo); $i++){
                        $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
                      
                   ?>
                      <tr>
                        <td><?php  echo $arreglo[$i]['Nombre'];?></td>
                        <td>$<?php echo number_format($arreglo[$i]['Precio'],2,'.',''); ?></td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total Orden</strong></td>
                        <td class="text-black font-weight-bold">$<?php echo number_format($total,2,'.',''); ?></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transferencia bancaria</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">Realice su pago directamente en nuestra cuenta bancaria. Utilice su ID de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en su cuenta.</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Pago con cheque</a></h3>

                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                        <p class="mb-0">Realice su pago directamente en nuestra cuenta bancaria. Utilice su ID de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en su cuenta.</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                        <p class="mb-0">Realice su pago directamente en nuestra cuenta bancaria. Utilice su ID de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en su cuenta.</p>
                      </div>
                      <div id="paypal-button-container"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-selection btn-lg py-3 btn-block" type="submit" >Realizar pedido</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>
    </form>
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

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '817'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            console.log(details);
            alert('Transaccion completada! ' + details.payer.name.given_name);
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
    
  </body>
</html>