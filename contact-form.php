<?php

$message_sent = false;

// Comprobar que los campos obligatorios están rellenados.
if (
    isset($_POST['email']) && $_POST['email'] != '' &&
    isset($_POST['name']) && $_POST['name'] != '' &&
    isset($_POST['lastName']) && $_POST['lastName'] != '' &&
    isset($_POST['message']) && $_POST['message'] != ''
) {

    // Comprobar que el email es válido.
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // Guardar datos del formulario en variables.
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $message = $_POST['messsage'];
        $phoneNum = $_POST['phoneNum'];

        $mail_recipient = "ricardo_christmann_apps1oa1920@cev.com";
        $body = '';

        $body .= "From: " . $name . " " . $lastName . "\r\n";
        $body .= "Phone number: " . $phoneNum . "\r\n";
        $body .= "Email: " . $email . "\r\n";
        $body .= "Message: " . $message . "\r\n";

        mail($mail_recipient, "Subject: ", $body);

        $message_sent = true;
    }
}
?>

<?php
if ($message_sent) :
?>

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
else :
    readfile("index.html");
?>

<?php
endif;
?>