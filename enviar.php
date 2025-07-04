<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Verifica que el correo sea válido
    if (!$correo) {
        echo "Correo electrónico no válido.";
        exit;
    }

    // Cambia esto por el correo donde quieres recibir los mensajes
    $to = "ceo.reverlab@gmail.com";

    $subject = "Mensaje desde el formulario de contacto";
    $body = "Nombre: $nombre\nCorreo: $correo\nMensaje:\n$mensaje";
    $headers = "From: $correo\r\nReply-To: $correo";

    // Intenta enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
}
?>
