<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail -> SMTPDebug = 0;                      //Enable verbose debug output
        $mail -> isSMTP();                                            //Send using SMTP
        $mail -> Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail -> SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail -> Username   = 'timecrafters1@gmail.com';              //SMTP username
        $mail -> Password   = 'aaosfgzhadqbubeu';                     //SMTP password
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail -> Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Correo no-reply
        $mail -> setFrom('no-reply@timecrafters.com', 'TimeCrafters'); 

        //Recipients
        $mail -> addAddress('bearias16@soy.sena.edu.co', 'Brighan Eliud Arias Duarte');     //Add a recipient
        // $mail -> addReplyTo('info@example.com', 'Information');
        $mail -> addCC('dfbarrios25@soy.sena.edu.co');
        // $mail -> addBCC('bcc@example.com');

        //Attachments
        // $mail -> addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail -> addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail -> isHTML(true);                                  //Set email format to HTML
        $mail -> Subject = ' Prueba de restablecer contraseña TimeCrafters
        ';
        $mail -> Body    = 'This is the HTML message body <b>in bold!</b>';

        $mail -> send();
        echo 'Correo enviado';
    } catch (Exception $e) {
        echo "No se ha podido enviar el mensaje. Error del remitente: {$mail -> ErrorInfo}";
    }

?>