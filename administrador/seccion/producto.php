<?php include("../template/header.php") ?>


<?php

$conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());

    
   


if (isset($_REQUEST['agregar'])) {
    $textId = (isset($_POST['textId'])) ? $_POST['textId'] : "";
    $textNombreProducto = (isset($_POST['textNombreProducto'])) ? $_POST['textNombreProducto'] : "";
    $textCategoria = (isset($_POST['textCategoria'])) ? $_POST['textCategoria'] : "";
    $textPrecio = (isset($_POST['textPrecio'])) ? $_POST['textPrecio'] : "";
    $textStock = (isset($_POST['textStock'])) ? $_POST['textStock'] : "";
    $txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
    $txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";


    $nombreArchivo = $_FILES['txtImagen']['name'];
    $tipoArchivo = $_FILES['txtImagen']['type'];
    $sizeArchivo = $_FILES['txtImagen']['size'];
    $imagenSubida = fopen($_FILES['txtImagen']['tmp_name'], 'r');
    $binariosImagen = fread($imagenSubida, $sizeArchivo);
    $binariosImagen = mysqli_escape_string($conexion, $binariosImagen);

    $sql = "INSERT INTO `productos` (`id_producto`, `nombre_producto`, `categoria`, `precio`, `stock`, `descripcion`, `nombre_imagen`, `imagen`, `tipo_imagen`) VALUES ('$textId', '$textNombreProducto', '$textCategoria', '$textPrecio', '$textStock', '$txtDescripcion', '$nombreArchivo','$binariosImagen', '$tipoArchivo')";
    $query = mysqli_query($conexion, $sql);
}


if (isset($_REQUEST['eliminar'])) {

    $textId = (isset($_POST['textId'])) ? $_POST['textId'] : "";

    $sqlBorrar = "DELETE FROM `productos` WHERE id_producto='$textId' ";
    $query = mysqli_query($conexion, $sqlBorrar);
}

if (isset($_REQUEST['eliminar'])) {

    $textId = (isset($_POST['textId'])) ? $_POST['textId'] : "";

    $sqlBorrar = "DELETE FROM `productos` WHERE id_producto='$textId' ";
    $query = mysqli_query($conexion, $sqlBorrar);
}
/*
if (isset($_REQUEST['Modificar'])) {

    $textId = (isset($_POST['textId'])) ? $_POST['textId'] : "";

    $sqlBorrar = "UPDATE `productos` SET `nombre_producto`='[value-2]',`categoria`='[value-3]',`precio`='[value-4]',`stock`='[value-5]',`descripcion`='[value-6]',`nombre_imagen`='[value-7]',`imagen`='[value-8]',`tipo_imagen`='[value-9]' WHERE `id_producto`=";
    $query = mysqli_query($conexion, $sqlBorrar);
}*/






?>

<div class="formulario-agregar-productos">

    <!--si no le pongo el enctype no va a poder recepcionar archivos-->
    <form method="POST" enctype="multipart/form-data">
        <table class="tabla_registro">
            <tr>
                <td colspan="6">
                    <h2>Registrar productos</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Codigo de Producto:</p>
                </td>
                <td>
                    <input type="num" class="form__registro" name="textId" id="textId">
                </td>
                <td>
                    <p>Nombre:</p>
                </td>
                <td>
                    <input type="text" class="form__registro" name="textNombreProducto" id="textNombreProducto">
                </td>
                <td>
                    <p>Categoria:</p>
                </td>
                <td>
                    <input type="text" class="form__registro" name="textCategoria" id="textCategoria">
                </td>

            </tr>
            <tr>
                <td>
                    <p>Precio unitario:</p>
                </td>
                <td>
                    <input type="num" class="form__registro" name="textPrecio" id="textPrecio">
                </td>
                <td>
                    <p>Cantidad:</p>
                </td>
                <td>
                    <input type="num" class="form__registro" name="textStock" id="textStock">
                </td>
                <td>
                    <p>Imagen referencial: </p>
                </td>
                <td>
                    <input type="file" name="txtImagen" id="boton" />
                    <label class="file-select" for="boton">Subir imagen</label>
                </td>
            </tr>

            <tr>
                <td>
                    <p>Descripcion: </p>
                </td>
                <td colspan="5">
                    <textarea name="txtDescripcion" cols="100" rows="3" id="txtDescripcion"></textarea>
                </td>

            </tr>
            <tr>
                <td colspan="6" align="center">
                    <div class="btn_productos">
                        <button type="submit" name="agregar" value="Agregar" class="btn-agregar">AGREGAR</button>
                        <button type="submit" name="accion" value="Modificar" class="btn-modificar">MODIFICAR</button>
                        <button type="submit" name="eliminar" value="eliminar" class="btn-cancelar">BORRAR</button>
                    </div>
                </td>

            </tr>

        </table>
</div>


<div class="tabla-productos">
    Tabla de libros (mostrar los datos del producto)
    <br>

    <table class="contenido_productos" border="1">
        <thead>
            <tr>
                <th>Id_producto</th>
                <th>Nombre Producto</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Descripcion</th>
                <th>Nombre imagen</th>
                <th>imagen </th>
                <th>tipo imagen</th>
                

            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM productos";
            $query = mysqli_query($conexion, $sql);

            $i = 0;
           
            while ($mostrar = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <?php $i++; ?>

                    <td><?php echo $mostrar['id_producto'] ?></td>
                    <td><?php echo $mostrar['nombre_producto'] ?></td>
                    <td><?php echo $mostrar['categoria'] ?></td>
                    <td><?php echo $mostrar['precio'] ?></td>
                    <td><?php echo $mostrar['stock'] ?></td>
                    <td><?php echo $mostrar['descripcion'] ?></td>
                    <td><?php echo $mostrar['nombre_imagen'] ?></td>
                    <td><img src="data:	image/png;base64,<?php echo base64_encode($mostrar['imagen']); ?> " height='100px' width='100px'  /></td>
                    <td><?php echo $mostrar['tipo_imagen'] ?></td>
                  



                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>

</div>

<script src="http://localhost:80/lianfarma/administrador/js-admin/login_admin.js"></script>


<?php include("../template/footer.php") ?>