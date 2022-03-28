<?php
include_once('connection.php');
class User extends Exception{

function loginUser($val){
$conn = connect();
$val['useremail']=mysqli_real_escape_string($conn, $val['useremail']);
$query = mysqli_query($conn,"select * from student where email = '".$val['useremail']."'");
$arr = mysqli_fetch_array($query);
if(mysqli_num_rows($query)<=0){
$message = "No Record Found";
} else if(password_verify($val['UserPassword'], $arr['pass'])){

echo "<script>alert('Login Successful')</script>";
session_start();
$clientid = mysqli_insert_id($conn);
$_SESSION['loginUserEmail'] = 	$val['useremail'];
session_regenerate_id(true);
if($_SESSION['loginUserEmail']=='admin@gmail.com'){
echo "<script>window.open('admin.php','_self')</script>";
}
if(isset($_SESSION['loginUserEmail'])){
echo "<script>window.open('dashboard.php','_self')</script>";
}
}else{
$message = "Incorrect Password";
}
echo "<script>alert('$message')</script>";
}                               

function regUsers($val)
{
$conn = connect();

$option=['cost'=>10 ,'salt' => 'csdcACSEcwrwcweCEWCWwcwecwcwWwecwecw'];
$pass=password_hash($val['UserPassword'], PASSWORD_BCRYPT,$option);
$name=mysqli_real_escape_string($conn, $val['username']);
$email=mysqli_real_escape_string($conn, $val['useremail']);

$query2 = mysqli_query($conn,"select * from users where email = '".$email."'");
if (mysqli_num_rows($query2) <= 0) {
$sql = "INSERT into users(name,email,password) values ('".$name."','".$email."','".$pass."')";
$query = mysqli_query($conn, $sql);
if($query=='1'){
echo "<script>alert('Successfully Registered')</script>";
}
}else{
echo "<script>alert('Email already Registered')</script>";
}
/*
session_start();
$clientid = mysqli_insert_id($conn);
$_SESSION['loginUserEmail'] = 	$val['useremail'];
$_SESSION['loginUserName'] = $name;
session_regenerate_id(true);
if(isset($_SESSION['loginUserName'])){
echo "<script>window.open('dashboard.php','_self')</script>";
}
*/
}


function student_submit($val)
{
$conn = connect();
$name=mysqli_real_escape_string($conn, $val['student_name']);
$class=$val['class'];
$roll_no=$val['roll_no'];
$phone_no=$val['phone_no'];
$email=mysqli_real_escape_string($conn, $val['email']);


$file = rand(1000,100000)."-".$_FILES['profile_img']['name'];
$file_loc = $_FILES['profile_img']['tmp_name'];
$file_size = $_FILES['profile_img']['size'];
$file_type = $_FILES['profile_img']['type'];
$folder="upload/";
$new_size = $file_size/1024;  
$new_file_name = strtolower($file);
$final_file=str_replace(' ','-',$new_file_name);
move_uploaded_file($file_loc,$folder.$final_file);

$option=['cost'=>10 ,'salt' => 'csdcACSEcwrwcweCEWCWwcwecwcwWwecwecw'];
$pass=password_hash($val['UserPassword'], PASSWORD_BCRYPT,$option);


$sql = "INSERT into student(name,class,phone_no,email,profile_pic,pass,roll_no) values ('".$name."','".$class."','".$phone_no."','".$email."','".$final_file."','".$pass."','".$roll_no."')";
$query = mysqli_query($conn, $sql);
if($query=='1'){
echo "<script>alert('Successfully Submitted')</script>";
echo "<script>window.open('index.php','_self')</script>";
}else{
echo "<script>alert('Not saved')</script>";
}
}



function gradesubmit($val)
{
$conn = connect();
$id=$val['id'];
$grade=$val['grade'];

$ss= mysqli_query($conn,"SELECT * FROM `student`");
while($s=mysqli_fetch_array($ss)){ 
$idd1=$s['id'];
$selected1=$val['grade'];  
$grade=$selected1[$idd1];
if($grade!=''){
$sql = "UPDATE `student` SET `grade` = '".$grade."' WHERE `student`.`id` = '".$idd1."';";
$query = mysqli_query($conn, $sql);
}
}
if($query=='1'){
echo "<script>alert('Successfully Submitted')</script>";
}else{
echo "<script>alert('Not saved')</script>";
}

//echo "<script>alert('".$grade."')</script>";

}

}