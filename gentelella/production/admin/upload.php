<?php

//upload.php
session_start();

$id = $_SESSION['id'];
$role = $_SESSION['role'];

if($role=='1')
{
$connect = new mysqli('localhost', 'root', '', 'evergreenschool');


$image = '';

if(isset($_FILES['file']['name']))
{
 $image_name = $_FILES['file']['name'];
 $valid_extensions = array("jpg","jpeg","png");
 $extension = pathinfo($image_name, PATHINFO_EXTENSION);
 if(in_array($extension, $valid_extensions))
 {
  $upload_path = 'images/' . time() . '.' . $extension;
  $image_url = './images/' . time() . '.' . $extension;
  if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_path))
  {

    $sql = "UPDATE `user_image` SET `image_url` = '$image_url' WHERE `user_image`.`id` = '$id';";
 $query = $connect->query($sql);

   $message = 'Image Uploaded';
   $image = $upload_path;
  }
  else
  {
   $message = 'There is an error while uploading image';
  }
 }
 else
 {
  $message = 'Only .jpg, .jpeg and .png Image allowed to upload';
 }
}
else
{
 $message = 'Select Image';
}

$output = array(
 'message'  => $message,
 'image'   => $image
);

echo json_encode($output);
}

?>