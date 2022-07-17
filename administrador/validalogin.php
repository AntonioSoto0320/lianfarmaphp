<?php

$conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());


  if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['passwordd']) && !empty($_POST['passwordd'])){
      $usuario = $_POST['user'];
      $password = $_POST['passwordd'];
      $query = "SELECT * FROM `usuario_admin` WHERE usuario ='$usuario' AND passwordd ='$password'";
      $result = mysqli_query($conexion,$query);

      if(mysqli_num_rows($result)>0){
        echo json_encode(array('respuestaLoginAdmin' => 1 ));
        
      }else{
        echo json_encode(array('respuestaLoginAdmin' => 0));
        
      }
  }

?>