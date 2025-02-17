<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';
//include 'schedule_appointment.php';

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// Database connection
require_once '../database/conection.php';

// Fetch patient details
$sql = "SELECT first_name, last_name, email FROM patients WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email);
$stmt->fetch();
$stmt->close();
$conn->close();


try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'clinica.software.is@gmail.com';                     //SMTP username
    $mail->Password   = 'nzvoebbylifggmea';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Modificaciones empiezan here

    //Recipients
    $mail->setFrom('clinica.software.is@gmail.com', 'Clinica Virgen de las Nieves');
    //Recibir el correo del paciente, fecha de la cita, nombre del paciente
    

    $mail->addAddress($email, 'Paciente'); 
    /*    //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    //Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    */
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Cita Confirmada';
    
    $mail->Body    = "
    <html>
    <head>
        <style>
            body {
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                line-height: 1.5;
                color: #333;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 80%;
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0);
            }
            .header {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
                color: #007bff;
            }
            .content {
                font-size: 16px;
                line-height: 1.6;
                color: #555;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>Cita Confirmada</div>
            <div class='content'>
                Estimado/a $first_name $last_name,<br><br>
                Su cita ha sido confirmada para el día $appointment_date a las $appointment_time.<br>
                Por favor, no olvide llevar su carnet de identidad.
            </div>
            <div class='footer'>
            <img src='../../client/asset/img/logo.png' alt='Clinica Virgen de las Nieves'/>
            </div>
        </div>
    </body>
    </html>";
    //$mail->AltBody = "Estimado/a $first_name $last_name, su cita ha sido confirmada, por favor no olvide llevar su carnet de identidad";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}