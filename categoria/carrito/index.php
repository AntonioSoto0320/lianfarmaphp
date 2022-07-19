<?php session_start();
if(isset($_SESSION['username'])){
    $usuarios = $_SESSION['username'];
    
}else{
        header("Location:http://localhost:80/lianfarma/categoria/iniciarsesion");
}
?>
<?php include_once '../../template/header.php'; ?>
<br/>
<br/>

<body class="bg-light">
    
</body>



<H4 class="h2-iniciar-sesion" align="center">COMPLETA TU COMPRA</H4>
<br>

<div class="container" >
    <div class="row">
            <div class="col">
            <div class="shadow-sm p-3 mb-5 mt-4 bg-body rounded">

                <h5 class="h2-iniciar-sesion ">Datos personales:</h5>
                <form class="row g-3 needs-validation" novalidate>

               <div class="col-md-3">
                <label for="nombre" class="form-label">Nombres Completos</label>
                <input id="nombre" name="nombre" type="text" class="form-control">                
               </div>

               <div class="col-md-3">
                <label for="apellido" class="form-label">Dirección</label>
                <input id="apellido" name="apellido" type="text" class="form-control">                
               </div>

               <div class="col-md-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input id="correo" name="correo" type="text" class="form-control">                
               </div>

               <div class="col-md-3">
                <label for="apellido" class="form-label">Teléfono</label>
                <input id="apellido" name="apellido" type="text" class="form-control">                
               </div>     
               
               <div class="col-md-4 px-5" >
               <label for="apellido" class="form-label">Metodo de pago:</label>
                <div class="btn-group btn-group-toggle px-5" data-toggle="buttons">
                    
            
                    <label class="btn btn-primary bg-light border-white" >
                            <input type="radio" id="pago" name="pago" value="visa" required> <img src="http://localhost:80/lianfarma/img/visa.png" alt="" width="30px" height="30px">                                          
                        </label>
                        
                        <label class="btn btn-primary bg-light border-white" >
                            <input type="radio" id="pago" name="pago" value="master" required> <img src="http://localhost:80/lianfarma/img/master.png" alt="" width="30px" height="30px">                                          
                        </label>
                        
                        <label class="btn btn-primary bg-light border-white">
                            <input type="radio" id="pago" name="pago" value="cmr" required> <img src="http://localhost:80/lianfarma/img/cmr.png" alt="" width="30px" height="30px">                                          
                            
    
                    </div>
                </div>             
               </div>  
                

               </div>
               </div>

            
           </div>
        </div>
    </div>
</div>

<table class="table table-light table-responsive shadow-lg p-3 mb-5 mt-4 bg-body rounded"  >   

    <tbody>
   

        <tr>
            <th width="30%">Descripción</th>
            <th width="25%" class="text-center">Cantidad</th>
            <th width="25%" class="text-center">Precio</th>
            <th width="25%"class="text-center">Total</th>
            <th width="10%">-</th>
        </tr>
        <?php
         if(isset($_SESSION['username'])){
            $usuarios = $_SESSION['username'];
        $conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());
        

        $sql = "SELECT c.id_producto,p.imagen, p.nombre_producto, p.precio,p.tipo_imagen, COUNT(*) cantidad FROM productos p INNER JOIN carrito_usuarios c ON c.id_producto = p.id_producto WHERE usuario='$usuarios' GROUP BY c.id_producto ORDER BY cantidad DESC";
       
        
        $query = mysqli_query($conexion, $sql);
           
        
       

        while ($mostrar = mysqli_fetch_array($query)) {

        ?>
        <tr>
        <?php 
            $cantidad=$mostrar['cantidad'];
            $precio=$mostrar['precio']; 
            $total=($precio*$cantidad);
            $sumaTotal+=$total;
           
            ?>
            <td width="30%"><?php echo $mostrar['nombre_producto']; ?></td>
            <td width="25%"class="text-center"><?php echo $cantidad; ?>  <a href="http://localhost:80/lianfarma/funciones/carrito_eliminar_menos.php?id_producto_eliminar=<?php echo $mostrar['id_producto']; ?>"><img src="http://localhost:80/lianfarma/img/boton-menos.png" alt="" height="20px" ></a> | <a href="http://localhost:80/lianfarma/funciones/agregar_carrito_mas.php?id_producto_mas=<?php echo $mostrar['id_producto']; ?>"><img src="http://localhost:80/lianfarma/img/mas.png" alt="" height="20px" ></a></td>
            <td width="25%"class="text-center"><?php echo $precio; ?></td>
            <td width="25%"class="text-center">S/.<?php echo $total; ?></td>
            <td width="10%">
            <a href="http://localhost:80/lianfarma/funciones/carroEliminarCarrito.php?id_producto_eliminar=<?php echo $mostrar['id_producto']; ?>" style="text-decoration:none; background-color: red; color:aliceblue; border-radius:3px;">eliminar</a>
            <!-- <form action="http://localhost:80/lianfarma/funciones/carroEliminarCarrito.php" method="post">
                    <input type="hidden" name="id_producto" value="<?php //echo $mostrar['id_producto']; ?>">
                    <input type="hidden" name="id_categoria" value="http://localhost:80/lianfarma/categoria/carrito">
                    <button class="btn-danger"  >Eliminar</button>
            </form> -->
            </td> 



           
        </tr>
        
        <?php }
         }
         ?>
        <tr>
            
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="center"><h3>S/.<?php echo $sumaTotal;?></h3></td>
            <td></td>

        </tr>
   
            <tr>
            <td colspan="5" align="center"> <a href="" style="text-decoration:none; background-color: green; color:aliceblue; border-radius:3px;">Procesar compra</a></td>
        </tr>

    </tbody>
</table>
