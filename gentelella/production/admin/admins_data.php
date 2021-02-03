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

// class data
if($received_data->action == 'fetchSingle_class_data')
{
 $query = "
 SELECT * FROM class 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 foreach($result as $row)
 {
  $data['id'] = $row['id'];
  $data['classes'] = $row['classes'];
 }

 echo json_encode($data);
}
// class data

// days data

if($received_data->action == 'fetchSingle_days_data')
{
 $query = "
 SELECT * FROM day 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 foreach($result as $row)
 {
  $data['id'] = $row['id'];
  $data['days'] = $row['days'];
 }

 echo json_encode($data);
}

// days data

// subjects data

if($received_data->action == 'fetchSingle_subjects_data')
{
 $query = "
 SELECT * FROM subject 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 foreach($result as $row)
 {
  $data['id'] = $row['id'];
  $data['classes'] = $row['classes'];
  $data['subjects'] = $row['subjects'];
 }

 echo json_encode($data);
}

// subjects data

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

// update class data

if($received_data->action == 'update_class_data')
{
 $data = array(
  ':id' => $received_data->id,
  ':classes' => $received_data->classes
  // ':id'   => $received_data->hiddenId
 );

 $query = "
 UPDATE class
 SET id = :id, 
 classes = :classes 
 WHERE id = :id
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Data Updated'
 );

 echo json_encode($output);
}

// update class data

// update days data

if($received_data->action == 'update_days_data')
{
 $data = array(
  ':id' => $received_data->id,
  ':days' => $received_data->days
  // ':id'   => $received_data->hiddenId
 );

 $query = "
 UPDATE day
 SET id = :id, 
 days = :days 
 WHERE id = :id
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Data Updated'
 );

 echo json_encode($output);
}

// update days data

// update subjects data

if($received_data->action == 'update_subjects_data')
{
 $data = array(
  ':id' => $received_data->id,
  ':subjects' => $received_data->subjects,
  ':classes' => $received_data->classes
  // ':id'   => $received_data->hiddenId
 );

 $query = "
 UPDATE subject
 SET id = :id, 
 subjects = :subjects,
 classes = :classes
 WHERE id = :id
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Data Updated'
 );

 echo json_encode($output);
}

// update subjects data

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

// delete class data

if($received_data->action == 'delete_class_data')
{
 $query = "
 DELETE FROM class 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $output = array(
  'message' => 'Class Deleted'
 );

 echo json_encode($output);
}

// delete class data

// delete days data

if($received_data->action == 'delete_days_data')
{
 $query = "
 DELETE FROM day 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $output = array(
  'message' => 'Day Deleted'
 );

 echo json_encode($output);
}

// delete days data

// delete subjects data

if($received_data->action == 'delete_subjects_data')
{
 $query = "
 DELETE FROM subject 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $output = array(
  'message' => 'Subject Deleted'
 );

 echo json_encode($output);
}

// delete subjects data

?>
