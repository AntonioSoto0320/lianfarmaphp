<?php 

include_once "funciones.php"; 

session_start();
if(isset($_SESSION['username'])){
    $usuarios = $_SESSION['username'];
}


if (!isset($_GET["id_producto_vaciar"])) {
    exit("No hay id_producto");
}
//agregarProductoAlCarrito($_POST["id_producto"]);
vaciarProductoDelCarrito($usuarios);



//ya esta echo solo que no es optimo ya que te devuelve a la ruta 
header("Location: http://localhost:80/lianfarma/categoria/cuidadopersonal/");

?>