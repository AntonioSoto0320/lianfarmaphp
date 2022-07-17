<?php 

include_once "funciones.php"; 




if (!isset($_GET["id_producto_eliminar"])) {
    exit("No hay id_producto");
}
//agregarProductoAlCarrito($_POST["id_producto"]);
quitarProductoDelCarrito($_GET["id_producto_eliminar"]);



//ya esta echo solo que no es optimo ya que te devuelve a la ruta 
header("Location: http://localhost:80/lianfarma/categoria/cuidadopersonal/");

?>