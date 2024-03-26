<?php

$host="localhost";
$dbname="ieeepels";
$username = "root";
$password  ="";

if (isset($_POST['registrer'])){
   
    $phone_number=$_POST["phone_number"];
    $target="lesCVS/".$phone_number.'-'.basename($_FILES['file']['name']);
// }
$conn=mysqli_connect( hostname: $host, 
                database: $dbname,
                password: $password, 
                username: $username );
 
if(mysqli_connect_errno()){
    die("Connection error: " .mysqli_connect_errno());
}

$pname=$phone_number."-".$_FILES["file"]["name"];
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$email=$_POST["email"];
$university=$_POST["university"];
$city=$_POST["city"];

// $tname=$_FILES["file"]["name"];
// $uploads_dir='/CVS';

$sql= "INSERT INTO form (first_name, last_name, phone_number, university, city, email,CV)
        VALUES ('$first_name','$last_name','$phone_number','$university','$city','$email','$pname')";
        
$stmt = mysqli_stmt_init($conn);
// if (! mysqli_stmt_prepare($stmt, $sql)){
//     die(mysqli_error($conn));
// }
mysqli_query($conn,$sql);
// mysqli_stmt_bind_param($stmt,'sss',
//                        $first_name,
//                        $last_name,
//                        $phone_number,
//                        $university,
//                        $city,
//                        $email,
//                        $pname );                                        
// mysqli_stmt_execute($stmt);
move_uploaded_file($_FILES['file']['tmp_name'],$target); 
}


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
$mail->Subject ="Verification d'inscription";
$mail->setFrom("ttalo1097@gmail.com",'PELSPLS');
$mail->addAddress($email);
$mail->Body='aaalarmaaach';
$mail->Send();
echo "email sent";
header('location:index.html');
$mail->SmtpClose();



