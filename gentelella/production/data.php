<?php

//include_once("config.php");


session_start();
$connect = new mysqli('localhost', 'root', '', 'evergreenschool');
//$received_data = json_decode(file_get_contents("php://input"));


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\emailverify\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\emailverify\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\emailverify\vendor\phpmailer\phpmailer\src\SMTP.php';

$data = json_decode(file_get_contents("php://input"));
$request = $data->request;
if($request == 1){
if ($connect->connect_error) {
    die("DataBase Connection failed: " . $connect->connect_error);
}
else{
$response = array('error' => false);
 
$email = $data->email;
$password = md5($data->password);
 
// if($email==''){
//  $response['error'] = true;
//  $response['message'] = "Email is required";
// }
// else if($password==''){
//  $response['error'] = true;
//  $response['message'] = "Your Password is required";
// }
// else{
 $sql = "SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
 $query = $connect->query($sql);
 
 if($query->num_rows>0){
  $row=$query->fetch_array();
  //echo $row['role'];
  $_SESSION['id']=$row['id'];
  //$response['message'] = "Login Successful";
  $response[] = array('status'=>1);
  //header('Location: index.html');
 }
 else{
  $response[] = array('status'=>0);
  //$response['error'] = true;
  //$response['message'] = "User Login Failed. User not Found";
 }
//}
 
 
 
//$connect->close();
 
//header("Content-type: application/json");
// echo json_encode($response);
// exit();
}
}


if($request == 2){
if ($connect->connect_error) {
    die("DataBase Connection failed: " . $connect->connect_error);
}
else{
$response = array('error' => false);
 
$email = $data->email;
$token = md5($data->email.date("l jS \of F Y h:i:s A"));
 
 $sql = "UPDATE `user` SET `token` = '$token' WHERE `user`.`email` = '$email'";
 $query = $connect->query($sql);
 
 if($query){

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "joyanta955@gmail.com";
$mail->Password   = "nfoyesvhldqurtua";
$mail->IsHTML(true);
$mail->AddAddress($email);
$mail->SetFrom("evergreenschool@gmail.com", "Evergreen School");
$mail->AddReplyTo("evergreenschool@gmail.com", "Evergreen School");
$mail->AddCC($email);
$mail->Subject = "Password Reset";
$content = "<a href='http://localhost/School%20Management/gentelella/production/reset.php?email=$email&token=$token'>Click Here To Reset</a>";
$mail->MsgHTML($content);
if($mail->Send()) {
  $response[] = array('status'=>1);
} else {
  $response[] = array('status'=>0);
  $response['error'] = true;
} 

 }
 else{
  $response[] = array('status'=>0);
  $response['error'] = true;
 }
//header("Content-type: application/json");

// echo json_encode($response);
// exit();
}
}
if($request == 3){
if ($connect->connect_error) {
    die("DataBase Connection failed: " . $connect->connect_error);
}
else{
$response = array('error' => false);
 
$email = $data->email;
$password = md5($data->password);
 $sql = "UPDATE `user` SET `password` = '$password' WHERE `user`.`email` = '$email'";
 $query = $connect->query($sql);
 
 if($query){

    $response[] = array('status'=>1);

 }
 else{
  $response[] = array('status'=>0);
  $response['error'] = true;
 }
//header("Content-type: application/json");

// echo json_encode($response);
// exit();
}
}
header("Content-type: application/json");
echo json_encode($response);
exit();
?>