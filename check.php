<?php

session_start();

include('conexion.php');

$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' and contraseña='$contraseña' ");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $email;

    header('location: checkout.php');
    mysqli_close($conexion);

}else{
    echo '
    <script> 
      alert("Email y/o contraseña incorrectos, verifique sus datos");
      window.location = "login.html";
    </script>
    ';
    mysqli_close($conexion);
}


?>