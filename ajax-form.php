<?php
include "functions/connection.php";
$conn=connect();

if(isset($_POST['grade'])){
$id=$_POST['userid'];
$grade=$_POST['grade'];

$sql = "UPDATE `student` SET `grade` = '".$grade."' WHERE `student`.`id` = '".$id."';";
$query = mysqli_query($conn, $sql);
$status='submitted';
}else{
$status='not submitted';
}
//echo $response;
  
$response = array(
"status" => $status,
"grade" => $grade,
);
echo json_encode($response);


exit;