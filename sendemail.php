<?php
$email=$_POST["emailadr"];
$message=$_POST["message"];

require"vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail= new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->Host="smtp.gmail.com";
$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port ="587";
$mail->Username="ttalo1097@gmail.com";
$mail->Password="xpmy yhui nmup cjpq";
$mail->Subject ="Message";
$mail->setFrom("ttalo1097@gmail.com",$email);
$mail->addAddress("ahmedbourmech4@gmail.com");
$mail->Body=$message;
$mail->Send();
echo "email sent";
header('location:index.html');
$mail->SmtpClose();
?>
