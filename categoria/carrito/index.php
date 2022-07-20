<?php session_start();
if(isset($_SESSION['username'])){
    $usuarios = $_SESSION['username'];
    
}else{
        header("Location:http://localhost:80/lianfarma/categoria/iniciarsesion");
}


?>

<?php include_once("../../template/header.php"); ?>
<br/>
<br/>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </head>
  <body >
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del titular de la tarjeta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="http://localhost:80/lianfarma/funciones/pagar_todo.php" method="POST">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <label for="message-text" class="col-form-label">Numero de tarjeta:</label>
                 <input type="text" class="form-control" id="recipient-name" require minlength="16" maxlength="16" size="16">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <label for="message-text" class="col-form-label">Fecha vencimiento:</label>
                <input type="text" class="form-control" id="recipient-name" placeholder="MM/AA" required minlength="4" maxlength="4" size="4">
                </div>

                <div class="col-md-6">
                <label for="message-text" class="col-form-label" >Codigo de seguridad:</label>
                <input type="text" class="form-control" id="recipient-name" placeholder="cvv" required minlength="3" maxlength="3" size="3">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <label for="message-text" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="recipient-name" required>
                </div>

                <div class="col-md-6">
                <label for="message-text" class="col-form-label" >Apellido:</label>
                <input type="text" class="form-control" id="recipient-name" required>
                </div>
            </div>
        </div>


        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 px-4">
                <label for="message-text" class="col-form-label">Tipo de tarjeta:</label><p> </p>
                <label class="btn-primary bg-light border-white px-4">
                            <input type="radio" id="pago" name="pago" value="VISA" required> <img src="http://localhost:80/lianfarma/img/visa.png" alt="" width="30px" height="30px">                                          
                        </label>
                        
                        <label class="btn-primary bg-light border-white px-4" >
                            <input type="radio" id="pago" name="pago" value="MasterCard" required> <img src="http://localhost:80/lianfarma/img/master.png" alt="" width="30px" height="30px">                                          
                        </label>
                        
                        <label class="btn-primary bg-light border-white px-4">
                            <input type="radio" id="pago" name="pago" value="CMR" required> <img src="http://localhost:80/lianfarma/img/cmr.png" alt="" width="30px" height="30px">                                          
                            
                            <p> </p><p> </p>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
                <button type="submit" class="btn-primary-green">Finalizar compra</button>
     </div> 
        </div>
        
            
 

      
    </div>
  </div>
</div>
  </body>
</html>





<H4 class="h2-iniciar-sesion" align="center">COMPLETA TU COMPRA</H4>
<br>

<div class="container" >
    <div class="row">
            <div class="col">
            <div class="shadow-sm p-3 mb-5 mt-4 bg-body rounded">

                <h5 class="h2-iniciar-sesion ">Datos personales:</h5>
                

               <div class="col-md-3">
                <label for="nombre" class="form-label">Nombres Completos</label>
                <input id="nombre" name="nombre" type="text" class="form-control" required>                
               </div>

               <div class="col-md-3">
                <label for="apellido" class="form-label">Dirección</label>
                <input id="direccion" name="direccion" type="text" class="form-control" required>                
               </div>

               <div class="col-md-3">
                <label for="apellido" class="form-label">Teléfono</label>
                <input id="telefono" name="telefono" type="text" class="form-control"   required  minlength="9" maxlength="9" size="9">                
               </div>     
                           
               </div>  
                

               </div>
               </div>

            
           </div>
        </div>
    </div>
</div>



<table class="table table-light"  >   

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
            <td colspan="5"> 
               
                <div class="alert alert-success">
                <div class="form-group">
                    <label for="my-input">Correo de contacto:</label>
                    <input id="email" class="form-control" type="email" name="email" placeholder="Ingrese su correo electrónico" required>
                </div>
                <small id="emailHelp" class="form-text text-muted"> Los datos de la compra se enviarán a este correo</small>
                </div>

                <div class="d-grid gap-2">
                <button type="button" class="btn-primary-green" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Procesar Compra</button>

  
                </div>
                </form>
                
            </td>
        </tr>


    </tbody>
</table>
