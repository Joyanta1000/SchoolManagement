<?php
session_start();
$connect = new mysqli('localhost', 'root', '', 'evergreenschool');
//$received_data = json_decode(file_get_contents("php://input"));
$data = json_decode(file_get_contents("php://input"));
$request = $data->request;
if($request == 1){
if ($connect->connect_error) {
    die("DataBase Connection failed: " . $connect->connect_error);
}
else{
$response = array('error' => false);
 
$email = $data->email;;
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
echo json_encode($response);
exit();
}
}
?>