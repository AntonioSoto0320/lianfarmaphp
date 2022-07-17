<?php
function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}
function obtenerConexion()
{
    
    

    $conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());

    return $conexion;
}

//este esta modificado

function agregarProductoAlCarrito($idProducto)
{

   
   $bd = obtenerConexion();
    $idSesion = session_id();
    $sql = "INSERT INTO carrito_usuarios(id_sesion, id_producto) VALUES ('$idSesion','$idProducto')";
    $query = mysqli_query($bd, $sql);
    return $query;
}


function obtenerIdsDeProductosEnCarrito()
{
    $bd = obtenerConexion();
    //iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT id_producto FROM carrito_usuarios WHERE id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia-> fetch(PDO::FETCH_COLUMN);
}


function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion();
    //iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT productos.id, productos.nombre, productos.descripcion, productos.precio
     FROM productos
     INNER JOIN carrito_usuarios
     ON productos.id = carrito_usuarios.id_producto
     WHERE carrito_usuarios.id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetch();
}


function quitarProductoDelCarrito($idProducto)
{
    $bd = obtenerConexion();
    //iniciarSesionSiNoEstaIniciada();
   // $idSesion = session_id();
    //$sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE id_sesion = ? AND id_producto = ?");
    
    $sql = "DELETE FROM carrito_usuarios WHERE id_producto = $idProducto LIMIT 1";
    $query = mysqli_query($bd, $sql);
    return $query;
    //$sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE id_producto = ?");
    //return $sentencia->execute([$idSesion, $idProducto]);
    //$sentencia->execute([$idProducto]);
    //return $sentencia->fetch();
   // return $sentencia->execute($idProducto);

}

?>