<?php session_start();
session_regenerate_id(true);
ob_start();
if(!isset($_SESSION['loginUserEmail'])){

echo '<script> location.href = "index.php";</script>';
}
include_once('functions/connection.php');
$email=$_SESSION['loginUserEmail'];
$conn=connect();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Quiz App</title>
<link rel="stylesheet" href="css/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<h3><a href="logout.php" >Logout</a></h3>

<div class="wrapper-quiz">

<div class="form-group"> <br>
<center><h3>Marksheet Details</h3></center><br>
<table class="table" width="100%">
<?php

$query11 = mysqli_query($conn,"SELECT * FROM `student` where email='$email';");
if (mysqli_num_rows($query11) > 0) { $i=1;
while($score = mysqli_fetch_assoc($query11)) { 
?>

   <tr>
      <td><b>Name</b></td>
      <td><?php echo $score['name'];?></td>
   </tr>
   <tr>
      <td><b>Roll No</b></td>
      <td><?php echo $score['roll_no'];?></td>
   </tr>
   <tr>
      <td><b>Phone No</b></td>
      <td><?php echo $score['phone_no'];?></td>
   </tr>
   <tr>
      <td><b>Photo</b></td>
      <td><img src="upload/<?php echo $score['profile_pic'];?>" height='150' width='150'></td>
   </tr>
<tr>
      <td><h3><a href="dashboard.php" >Back to Dashboard</a></h3>
</td>
   </tr>
 
<?php $i++; } } else { ?>

   <tr>
      <td>No record found</td> 
   </tr>
<?php } ?>
</table>
</div>


</div>
</body>
</html>
