<?php

include_once "funciones.php"; 

session_start();

if(isset($_SESSION['username'])){
    $usuarios = $_SESSION['username'];
    //echo $usuarios;

}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lianfarma7@gmail.com';                     //SMTP username
    $mail->Password   = 'crxpifffaihtdknt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('lianfarma7@gmail.com', 'LianFarma');
    $mail->addAddress('antoniosotofut7@gmail.com');     //Add a recipient
    
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Compra Online';
    $mail->Body    = 'prueba';
    $mail->AltBody = 'Tus Compras de LianFarma';
    $mail->addAttachment('attachments/boletas/boleta.pdf');

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

elimarCarritoVendido($usuarios);

?>