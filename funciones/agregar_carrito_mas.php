<?php 

include_once "funciones.php"; 

session_start();
if(isset($_SESSION['username'])){
    $usuarios = $_SESSION['username'];
}


if (!isset($_GET["id_producto_mas"])) {
    exit("No hay id_producto");
}

agregarProductoAlCarrito($_GET["id_producto_mas"],$usuarios);



header("Location: http://localhost:80/lianfarma/categoria/carrito/");

?>