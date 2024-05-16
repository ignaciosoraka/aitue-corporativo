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
$mail->setFrom('Susana@aitue.net', 'Aitue Corportivo Whatsapp');
$mail->addAddress('Susana@aitue.net', 'Susana');
$mail->addAddress('cristian@suprads.com', 'Cristian'); 
$mail->isHTML(true);

// Recuperación de datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// Construcción del cuerpo del correo
$mail->Subject = 'Formulario WSP';
$mail->Body = "Nombre: $nombre<br>Email: $email<br>Telefono: $telefono";

// Envío del correo y verificación
if(!$mail->send()) {
    echo 'No se pudo enviar el mensaje.';
    echo 'Error del mailer: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje ha sido enviado.';
    header("Location: https://wa.me/5491141640955?text=Quiero%20más%20%20información%20acerca%20de%20sus%20serivicios%20corporativos.");
}
?>
