<?php include_once '../../template/header.php'; ?>

<h1>Todo Farmacia</h1>
<br>
<br>





<div class="container-card">
    <?php


    $conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());

    $sql = "SELECT * FROM `productos` WHERE categoria='FF';";
    $query = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_array($query)) {

    ?>
        <div class="card">
            <div class="imgBx">
                <img src="data:<?php echo  $mostrar['tipo_imagen']; ?>;base64,<?php echo base64_encode($mostrar['imagen']); ?>" alt="headphone">
            </div>
            <div class="contentBx">
                <h2><?php echo $mostrar['nombre_producto'] ?></h2>

                <div class="price">
                    <h2>S/<?php echo $mostrar['precio'] ?></h2>
                </div>

                <div class="description">
                    <p><?php echo $mostrar['descripcion'] ?></p>
                </div>
                <form action="../../funciones/agregar_carrito.php" method="post">
                    <input type="hidden" name="id_producto" value="<?php echo $mostrar['id_producto']; ?>">
                    <input type="hidden" name="id_categoria" value="http://localhost:80/lianfarma/categoria/farmacia/">
                    <button class="button is-primary" style="border-radius: 10px;">
                        <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
                    </button>
                </form>
                
            </div>
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