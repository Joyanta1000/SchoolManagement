<?php

//action.php

$connect = new PDO("mysql:host=localhost;dbname=evergreenschool", "root", "");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
if($received_data->action == 'fetchall')
{
 $query = "
 SELECT * FROM role 
 ORDER BY id;
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}
if($received_data->action == 'insert')
{
 $data = array(
  ':id' => $received_data->id,
  ':role' => $received_data->role
 );

 $query = "
 INSERT INTO role 
 (id, role) 
 VALUES (:id, :role)
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'New Role Added'
 );

 echo json_encode($output);
}
if($received_data->action == 'fetchSingle')
{
 $query = "
 SELECT * FROM role 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 foreach($result as $row)
 {
  $data['id'] = $row['id'];
  $data['role'] = $row['role'];
 }

 echo json_encode($data);
}
if($received_data->action == 'update')
{
 $data = array(
  ':id' => $received_data->id,
  ':role' => $received_data->role
  // ':id'   => $received_data->hiddenId
 );

 $query = "
 UPDATE role 
 SET id = :id, 
 role = :role 
 WHERE id = :id
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Data Updated'
 );

 echo json_encode($output);
}

if($received_data->action == 'delete')
{
 $query = "
 DELETE FROM role 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $output = array(
  'message' => 'Role Deleted'
 );

 echo json_encode($output);
}

?>
