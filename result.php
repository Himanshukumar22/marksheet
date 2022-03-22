<?php session_start();
session_regenerate_id(true);
ob_start();
if(!isset($_SESSION['loginUserEmail'])){

    echo '<script> location.href = "index.php";</script>';
}
$useremail= $_SESSION['loginUserEmail'];
include_once('functions/connection.php');

$conn=connect();

$query = mysqli_query($conn,"select * from users where email = '".$useremail."'");
$arr = mysqli_fetch_array($query);
$user_id=$arr['id'];

$query2 = mysqli_query($conn,"select * from quiz_score where user_id = '".$user_id."'");
if (mysqli_num_rows($query2) > 0) {

$query1 = mysqli_query($conn,"UPDATE quiz_score SET score='".$_GET['r']."' where  user_id='".$user_id."'");

}else{

$sql = "INSERT into quiz_score(user_id,score) values ('".$user_id."','".$_GET['r']."')";
$query1 = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Quiz App</title>
      <link rel="stylesheet" href="css/main.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
       <h3><a href="logout.php">Logout</a></h3>
      <div class="wrapper-quiz">
         <div class="title-text">
            <div class="title login">
               Result
            </div>
         </div><br>
         <div class="form-group"> 
            <h3>Result : <?php if($_GET['r']=='null'){ echo 0;}else{ echo $_GET['r'];}?>/5
            
       <a href="dashboard.php?ret=0" style="float: right;">Retry Quiz</a>
            
         </div>
<div class="form-group"> <br>
<center><h3>Leaderboard</h3></center>
<table class="table" width="100%">
   <tr>
      <td>#</td>
      <td>Name</td>
      <td>Email</td>
      <td><center>Score</center></td>
   </tr>
<?php

$query11 = mysqli_query($conn,"SELECT * FROM `quiz_score` LEFT JOIN users ON users.id=quiz_score.user_id ORDER BY score DESC LIMIT 10;");
if (mysqli_num_rows($query11) > 0) { $i=1;
while($score = mysqli_fetch_assoc($query11)) { 
?>
   <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $score['name'];?></td>
      <td><?php echo $score['email'];?></td>
      <td><center><?php echo $score['score'];?></center></td>
   </tr>
<?php $i++; } } else { ?>

   <tr>
      <td>No record found</td> 
   </tr>
<?php } ?>
</table>
</div>

            </div>
         </div>
      </div>
   </body>
</html>
