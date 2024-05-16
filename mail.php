<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// Configuración SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'soporte@kerneltech.dev';
$mail->Password = 'hqyycwyzurppkzco';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Parámetros de envío
$mail->setFrom('Susana@aitue.net', 'Aitue Corportivo');
$mail->addAddress('Susana@aitue.net', 'Susana');
$mail->addAddress('cristian@suprads.com', 'Cristian'); 
$mail->isHTML(true);

// Recuperación de datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$ciudad = $_POST['ciudad'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

// Construcción del cuerpo del correo
$mail->Subject = 'Asunto';
$mail->Body = "Nombre: $nombre<br>Email: $email<br>Ciudad: $ciudad<br>Asunto: $asunto<br>Mensaje: $mensaje";

// Envío del correo y verificación
if(!$mail->send()) {
    echo 'No se pudo enviar el mensaje.';
    echo 'Error del mailer: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje ha sido enviado.';
    header("Location: gracias.html");
}
?>
