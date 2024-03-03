<?php
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$phone_number=$_POST["phone_number"];
$university=$_POST["university"];
$city=$_POST["city"];
$email=$_POST["email"];


$host="localhost";
$dbname="ieeepels";
$username = "root";
$password  ="";

$conn=mysqli_connect( hostname: $host, 
                database: $dbname,
                password: $password, 
                username: $username );
 
if(mysqli_connect_errno()){
    die("Connection error: " .mysqli_connect_errno());
}

$sql= "INSERT INTO form (first_name, last_name, phone_number, university, city, email)
        VALUES (?, ?, ?, ?, ?, ?)";
        
$stmt = mysqli_stmt_init($conn);
if (! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssisss",
                       $first_name,
                       $last_name,
                       $phone_number,
                       $university,
                       $city,
                       $email);                                        
mysqli_stmt_execute($stmt);

echo "Record saved .";


header('location:index.html');
