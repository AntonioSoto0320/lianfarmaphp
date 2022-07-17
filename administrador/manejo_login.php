<?php 
/*
$usuario=(isset($_POST['user']));
$passwordd=(isset($_POST['passwordd']));
*/

$usuario=$_POST['user'];
$passwordd=$_POST['passwordd'];



$conexion = new mysqli("localhost", "root", "", "lianfarmaphp") or die("no se conecto a la base de datos" . mysqli_connect_error());

$bandera=false;


$sql ="SELECT usuario,password  FROM usuario_admin";
$query = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($query)) {

    if($usuario == $mostrar['usuario'] && $passwordd==$mostrar['password']){
        
        $bandera=true;
        break;
    }
    
}


if($bandera==true){
    //header(" Location: http://localhost:80/lianfarma/administrador/inicio.php ");
    
      echo json_encode(array('respuestaLoginAdmin'=> 1 ));
   //echo json_encode('usuario y contra es el de igual a la base de datos');
}else{
    
    echo json_encode(array('respuestaLoginAdmin'=> 0 ));
    //echo json_encode('su usuario y contra es invalido');
}





?>