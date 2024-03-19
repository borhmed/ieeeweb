<?php
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ahmedbourmech4@gmail.com';
    $mail->Password = 'ahmedbourmeche2624';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('ahmedbourmech4@gmail.com', 'larmch');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body    = nl2br($message);

    $mail->send();
    header('Location: feedback_success.html');
} catch (Exception $e) {
    header('Location: feedback_error.html');
}
?>