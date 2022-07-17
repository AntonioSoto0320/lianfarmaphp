<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost:80/lianfarma/css/master.css">



</head>

<?php include_once '../../template/header.php'; ?>

<body>

<br>
<br>
<br>
<br>
<br>

    <div class="login-administrador">
        <img src="http://localhost:80/lianfarma/img/logo-Administrador.jpg" class="avatar" alt="Avatar Image">
        <h1>Inicio de Sesion del Administrador</h1>
       
        <form id="formulario" method="POST">

            <label for="username">Usuario</label>
            <input type="text" id="user" name="user" placeholder="Ingresa tu usuario">

            <label for="password">Contraseña</label>
            <input type="password" id="passwordd " name="passwordd" placeholder="Ingresa tu contraseña">
            <input type="submit" value="Iniciar Sesion">
            <a href="#">¿Perdiste tu contraseña?</a><br>
            <a href="#">¿No tienes una cuenta?</a>
            <br>

            <div id="alert"></div>


        </form>
    </div>




</body>
<script src="http://localhost:80/lianfarma/administrador/js-admin/login_admin.js"></script>

</html>