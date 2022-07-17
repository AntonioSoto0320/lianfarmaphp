<?php
include_once "funciones.php";

session_start();
if(isset($_SESSION['username'])){
    $usuarios = $_SESSION['username'];
}

if (!isset($_POST["id_producto"])) {
    exit("No hay id_producto");
}
agregarProductoAlCarrito($_POST["id_producto"],$usuarios);





header("Location: ".$_POST["id_categoria"]);

//echo $_POST["id_producto"];


?>agregado