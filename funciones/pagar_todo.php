<?php  
include_once "funciones.php"; 

session_start();

if(isset($_SESSION['username'])){
    $usuarios = $_SESSION['username'];
    //echo $usuarios;

}

if(isset($_POST['email'])){
    $correo= $_POST['email'];

}
if(isset($_POST['nombre'])){
    $nombres_apellidos= $_POST['nombre'];

}
if(isset($_POST['direccion'])){
    $direccion= $_POST['direccion'];

}
if(isset($_POST['telefono'])){
    $telefono= $_POST['telefono'];

}
if(isset($_POST['pago'])){
    
    $tarjeta=$_POST['pago'];

}


          




detalleCompra($usuarios, $nombres_apellidos, $direccion,$correo,$telefono,$tarjeta);
infoCompra($usuarios);
actualizarStock();















header("Location: http://localhost:80/lianfarma/funciones/enviar_mail.php");







?>