<?php
include_once('connection.php');
class User extends Exception{

function loginUser($val){
$conn = connect();
$val['useremail']=mysqli_real_escape_string($conn, $val['useremail']);
$query = mysqli_query($conn,"select * from users where email = '".$val['useremail']."'");
$arr = mysqli_fetch_array($query);
if(mysqli_num_rows($query)<=0){
$message = "No Record Found";
} else if(password_verify($val['UserPassword'], $arr['password'])){

echo "<script>alert('Login Successful')</script>";
session_start();
$clientid = mysqli_insert_id($conn);
$_SESSION['loginUserEmail'] = 	$val['useremail'];
session_regenerate_id(true);
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


}