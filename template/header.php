<?php 
session_start();
if(isset($_SESSION['username'])){
    $usuarios = $_SESSION['username'];
    
}

   

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="http://localhost:80/lianfarma/css/style.css">
    <link rel="stylesheet" href="http://localhost:80/lianfarma/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost:80/lianfarma/css/custom.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <header>
        <div class="header_superior">
            <div class="logo">

                <a href="http://localhost:80/lianfarma/"><img src="http://localhost:80/lianfarma/img/logo.jpg" alt=""></a>

            </div>
            <div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div><div class="Buscador"></div>

            <?php 
            if(isset($_SESSION['username'])){ ?>
                <div class="username">
                <a>Bienvenido: <?php echo $usuarios; ?></a>

               
                </div>

                <a href="http://localhost:80/lianfarma/funciones/cerrar_sesion.php">Cerrar Sesion</a>
            <?php
            }
            ?> 
            <div>
                <img src="" alt="">
            </div>



        </div>
        <div class="container_menu">
            <div class="menu">
                <nav class="underline">
                    <ul>
                        <li><a href="#">Categorias</a>
                            <ul>
                                <li><a href="http://localhost:80/lianfarma/categoria/cuidadopersonal/">Cuidado personal </a></li>
                                <li><a href="http://localhost:80/lianfarma/categoria/nutricion/">Nutrición</a></li>
                                <li><a href="http://localhost:80/lianfarma/categoria/farmacia/">Farmacia</a></li>
                                <li><a href="http://localhost:80/lianfarma/categoria/bebes/">Bebés</a></li>
                            </ul>
                        </li>
                        
                        
                        
                        <li><a href="http://localhost:80/lianfarma/categoria/ubicanos">Ubicanos</a></li>
                        
                        

                        <li><a href="http://localhost:80/lianfarma/categoria/iniciarsesion">Iniciar sesión</a></li>
                        <li></li>
                        <li></li>
                        
                        <div class="container">
                            <div class="row">
                                <div class="two columns u-pull-right">
                                    <ul>
                                        <li class="submenu">
                                        <a href="http://localhost:80/lianfarma/categoria/carrito"><img src="http://localhost:80/lianfarma/img/carrito.png" id="img-carrito"></a>
                                        
                                            <div id="carrito">

                                                <table id="lista-carrito" class="u-full-width">
                                                    <thead>
                                                        <tr>
                                                            <th>Imagen</th>
                                                            <th>Nombre</th>
                                                            <th>Precio</th>
                                                            <th>Cantidad</th>
                                                            <th>Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        if(isset($_SESSION['username'])){
                                                            $usuarios = $_SESSION['username'];
                                                        $conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());
                                                        

                                                        $sql = "SELECT p.imagen, p.nombre_producto, p.precio,p.tipo_imagen,c.id_producto, COUNT(*) cantidad FROM productos p INNER JOIN carrito_usuarios c ON c.id_producto = p.id_producto WHERE usuario='$usuarios' GROUP BY c.id_producto ORDER BY cantidad DESC";
                                                       
                                                        
                                                        $query = mysqli_query($conexion, $sql);
                                                           
                                                        
                                                       

                                                        while ($mostrar = mysqli_fetch_array($query)) {

                                                        ?>
                                                            <tr>


                                                                <td><img src="data:<?php echo  $mostrar['tipo_imagen']; ?>;base64,<?php echo base64_encode($mostrar['imagen']); ?>" height="100px" width="100px" /></td>
                                                                <td><?php echo $mostrar['nombre_producto']; ?></td>
                                                                <td><?php echo $mostrar['precio']; ?></td>
                                                                <td><?php echo $mostrar['cantidad']; ?></td>
                                                                <td><a href="   ">eliminar</a></td>


                                                                

                                                            </tr>
                                                        <?php }
                                                         }
                                                        ?>
                                                    </tbody>
                                                </table>

                                                <a href="<?php if(isset($_SESSION['username'])){ ?>http://localhost:80/lianfarma/funciones/vaciar_carrito.php?id_producto_vaciar=<?php echo $usuarios ?><?php } ?>" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a> |
                                                <a href="http://localhost:80/lianfarma/categoria/carrito">Compar</a> 
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </ul>
                </nav>
            </div>
        </div>
    </header>