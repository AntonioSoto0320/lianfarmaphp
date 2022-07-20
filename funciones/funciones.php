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

function agregarProductoAlCarrito($idProducto,$usuarios)
{

   
   $bd = obtenerConexion();
    $idSesion = session_id();
    $sql = "INSERT INTO carrito_usuarios(usuario, id_producto) VALUES ('$usuarios','$idProducto')";
    $query = mysqli_query($bd, $sql);
    return $query;
}

function detalleCompra($usuarios, $nombres_apellidos, $direccion,$correo,$telefono,$tarjeta)
{

   $bd = obtenerConexion();
    $sql = "INSERT INTO `detalle_compra` (`usuario`, `nombre_apellido`, `direccion_envio`, `correo`, `telefono`,`tarjeta`) VALUES ('$usuarios', '$nombres_apellidos', '$direccion', '$correo', '$telefono', '$tarjeta')";
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

function infoCompra($usuarios)
{
    $bd = obtenerConexion();
    $sql = "INSERT INTO `informacion_compra_producto`(`orden_compra`, `id_producto`, `usuario`, `nombre_producto`, `precio`, `cantidad`) SELECT dc.orden_compra,c.id_producto,c.usuario,p.nombre_producto,p.precio,COUNT(*) cantidad FROM productos p INNER JOIN carrito_usuarios c ON c.id_producto = p.id_producto INNER JOIN detalle_compra dc ON c.usuario = dc.usuario WHERE dc.usuario ='antonio45' GROUP BY c.id_producto ORDER BY cantidad DESC";
    $query = mysqli_query($bd, $sql);
    return $query;
   
}

function actualizarStock()
{
    $bd = obtenerConexion();
    $sql = "UPDATE productos INNER JOIN informacion_compra_producto ON productos.id_producto = informacion_compra_producto.id_producto SET productos.stock = productos.stock - informacion_compra_producto.cantidad";
    $query = mysqli_query($bd, $sql);
    return $query;
   
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


function quitarProductoDelCarrito($idProducto,$usuarios)
{
    $bd = obtenerConexion();
    $sql = "DELETE FROM carrito_usuarios WHERE usuario= '$usuarios' && id_producto=$idProducto LIMIT 1";
    $query = mysqli_query($bd, $sql);
    return $query;
    

}

function quitarTodosProductoDelCarrito($idProducto,$usuarios)
{
    $bd = obtenerConexion();
    $sql = "DELETE FROM carrito_usuarios WHERE usuario= '$usuarios' && id_producto=$idProducto";
    $query = mysqli_query($bd, $sql);
    return $query;
    

}

function vaciarProductoDelCarrito($usuarios)
{
    $bd = obtenerConexion();
    $sql = "DELETE FROM carrito_usuarios WHERE usuario= '$usuarios' ";
    $query = mysqli_query($bd, $sql);
    return $query;
    

}

?>