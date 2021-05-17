<?php
// Importar librerías de PHPMailer.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Variable para verificar si el mensaje se ha enviado o no.
$message_sent = false;

// Comprobar que los campos obligatorios están rellenados.
if (
    isset($_POST['email']) && $_POST['email'] != '' &&
    isset($_POST['name']) && $_POST['name'] != '' &&
    isset($_POST['lastName']) && $_POST['lastName'] != '' &&
    isset($_POST['subject']) && $_POST['subject'] != '' &&
    isset($_POST['message']) && $_POST['message'] != ''
) {

    // Comprobar que el email es válido.
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // Guardar datos del formulario en variables.
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phoneNum'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Tu correo de gmail.
        $mail_recipient = "";
        $body = '';

        // La variable body se encarga de mostrar los varios datos del formulario de una manera sencilla.
        $body .= "From: " . $name . " " . $lastName . "\r\n";
        $body .= "\r\n" . "Phone number: " . $phoneNum . "\r\n";
        $body .= "\r\n" . "Email: " . $email . "\r\n";
        $body .= "\r\n" . "Message: " . $message . "\r\n";

        // Instanciamos PHPMailer y pasamos true para activar las excepciones.
        $mail = new PHPMailer(true);

        // Try catch para manejar las excepciones que puedan ocurrir.
        try {
            // AJUSTES SMTP.
            // Enviamos usando el protocolo SMTP.
            $mail->isSMTP();
            // Usamos el server SMTP de gmail porque recibimos los emails en nuestra cuenta de gmail.    
            $mail->Host = 'smtp.gmail.com';
            // Usar el server SMTP de gmail requiere autenticación.
            $mail->SMTPAuth = true;
            $mail->Username = $mail_recipient;
            $mail->Password = '';   // Tu password de gmail.
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // AJUSTES EMAIL.
            $mail->setFrom($email, $name);  // Sender.
            $mail->addAddress($mail_recipient, 'Tu Nombre'); // Recipient.

            // BODY Y SUBJECT DEL EMAIL.
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = nl2br($body);
            $mail->AltBody = nl2br($body);  // Para mostrar el body en clientes email que no soportan html.

            $mail->send();
            // echo 'El mensaje fue enviado correctamente';

            $message_sent = true;
        } catch (Exception $e) {
            // Mostrar logs en caso de error.
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            echo "El mensaje no ha podido ser enviado. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>

<?php
// Mostrar el html siguiente si el mensaje fue enviado correctamente.
if ($message_sent) :
?>

    <!-- Si el mensaje fue enviado correctamente mostramos una página expresando las gracias con código html simple. -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link rel="stylesheet" href="stylesheet.css">
        <!-- Bootstrap CSS y scripts JS. -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <!-- FontAwesome. -->
        <script src="https://kit.fontawesome.com/cd805cb1d8.js" crossorigin="anonymous"></script>
    </head>

    <body class="site-bg">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center" style="height: 350px;">
                <h3 class="font-weight-bold">Gracias por contactarnos. Responderemos lo más pronto posible.</h3>
            </div>
        </div>
    </body>
    </html>

<?php
endif;
?>