<?php
$destinatario = 'Susana@aitue.net';

$nombre = $_POST['nombre'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$telefono = $_POST['telefono'];
$mensaje = "Mensaje de contacto desde el formulario web.\n\n";

$mensaje .= "Nombre: " . $nombre . "\n";
$mensaje .= "Correo Electrónico: " . $email . "\n";
$mensaje .= "Número de teléfono: " . $telefono . "\n";

$asuntoCorreo = "Consulta de " . $nombre;

$header = "From: " . $nombre . " <" . $email . ">\r\n";
$header .= "Reply-To: " . $email . "\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($destinatario, $asuntoCorreo, $mensaje, $header)) {
    // Redirigir a la página de agradecimiento
    header("Location: gracias.html");
    exit();
} else {
    ?>
    <h3 class="error">Ocurrió un error, por favor vuelve a intentarlo</h3>
    <?php
}
?>
