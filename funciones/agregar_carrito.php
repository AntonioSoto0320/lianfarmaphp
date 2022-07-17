<?php
include_once "funciones.php";

if (!isset($_POST["id_producto"])) {
    exit("No hay id_producto");
}
agregarProductoAlCarrito($_POST["id_producto"]);





header("Location: ".$_POST["id_categoria"]);

//echo $_POST["id_producto"];


?>agregado