

<?php include_once '../../template/header.php'; ?>

<h1>Todo para Bebes</h1>
<br>
<br>




<div class="card">
    <?php
    $conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());

    $sql = "SELECT * FROM `productos` WHERE categoria='BB';";
    $query = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_array($query)) {

    ?>
        <div class="imgBox">
            <img src="data:<?php echo $tipoArchivo ?>;base64,<?php echo base64_encode($mostrar['imagen']); ?>alt='mouse corsair' class='mouse'" />
            </di <div class="contentBox">
            <h3><?php echo $mostrar['nombre_producto'] ?></h3>
            
            <h2 class="price">S/.<?php echo $mostrar['precio'] ?></h2>
            <a href="#" class="buy">Agregar al carrito</a>
        </div>
        <br>

    <?php
    }

    ?>
</div>

