<?php 
/*
$usuario=(isset($_POST['user']));
$passwordd=(isset($_POST['passwordd']));
*/
session_start();

$usuario=$_POST['user'];
$passwordd=$_POST['passwordd'];



$conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());

$bandera=0;
$tipo_admin="a";
$tipo_user="u";

$sql ="SELECT usuario,password,tipo  FROM usuario_admin";
$query = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($query)) {

    if($usuario == $mostrar['usuario'] && $passwordd== $mostrar['password'] && $tipo_admin == $mostrar['tipo'] ){
        $_SESSION['username']= $usuario ; 
        $bandera=-1;
        break;
    }else if($usuario == $mostrar['usuario'] && $passwordd== $mostrar['password'] && $tipo_user == $mostrar['tipo'] ){
        $_SESSION['username']= $usuario ; 
        $bandera=-2;
        header("Location: http://localhost:80/lianfarma/");
        break;
    }
    
}

 if($bandera==-1){
    //header(" Location: http://localhost:80/lianfarma/administrador/inicio.php ");
    
      echo json_encode(array('respuestaLoginAdmin'=> 1 ));
   //echo json_encode('usuario y contra es el de igual a la base de datos');
}else{
    
    echo json_encode(array('respuestaLoginAdmin'=> 0 ));
    //echo json_encode('su usuario y contra es invalido');
}






?>