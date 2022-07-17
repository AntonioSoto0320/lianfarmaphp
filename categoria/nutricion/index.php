<?php include_once '../../config/config.php';?>

<?php include_once '../../template/header.php';?>

<h1>Todo Nutricion</h1>
<br>
<br>



<div class="container">
    <?php
    $conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());

    $sql = "SELECT * FROM `productos` WHERE categoria='NN';";
    $query = mysqli_query($conexion, $sql);
    
    while ($mostrar = mysqli_fetch_array($query)) {
        
    ?>
        <div class="card">
            <img src="data:<?php echo $tipoArchivo ?>;base64,<?php echo base64_encode($mostrar['imagen']); ?>" />
            <h4><?php echo $mostrar['nombre_producto'] ?></h4>

            <p class="precio">S/.<?php echo $mostrar['precio'] ?><span class="u-pull-right"></span></p>
            <a href="#" class="u-full-width button-primary button input agregar-carrito">Agregar Carrito</a>
        </div>
    <?php
    }
   
    ?>
</div>
   
  
<br>
<br>
<br>
<br>
<br>