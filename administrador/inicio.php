<!DOCTYPE html>
    <html lang="es">
    <?php
    $conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());

    //$usuario = $_SESSION['user'];
    //$passwordd = $_SESSION['passwordd'];


    //if(!isset($usuario) && !isset($passwordd)){
      //  header("location:http://localhost:80/lianfarma/categoria/iniciarsesion/index.php");
      
    //}
    

    ?>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <title>Inicio</title>
      <link rel="stylesheet" href="css/style_admin.css">
      <link rel="stylesheet" href="./css/style_admin.css">
      <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>

      <header>
      <div class="container_menu">
        <nav class="menu">


          <?php $url = "http://" . $_SERVER['HTTP_HOST'] . "/lianfarma" ?>

          <ul>
            <li><a href="http://localhost:80/lianfarma/administrador/inicio.php">Inicio</a></li>
            <li><a href="http://localhost:80/lianfarma/administrador/seccion/producto.php">Productos</a></li>
            <li><a href="http://localhost:80/lianfarma/">Ver sitio web</a></li>
            <li><a href="http://localhost:80/lianfarma/administrador/cerrar.php">Cerrar</a></li>
          </ul>
        </nav>


      </header>


   
<?php include("./template/footer.php") ?>


</body>
<script src="login_admin.js"></script>

</html>