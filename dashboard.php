<?php session_start();
session_regenerate_id(true);
ob_start();
if(!isset($_SESSION['loginUserEmail'])){

echo '<script> location.href = "index.php";</script>';
}
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

<div class="title-text">
<div class="title login">
Question
</div>
</div><br>
<?php
$answer1 = array('<span id="ans1"><input type="radio" name="q1" id="o1" value="1" onClick="redirect()"/><span> test</span>','<span id="ans2"><input type="radio" name="q1" id="o2" value="2" onClick="redirect()"/>  <span>test1</span>','<span id="ans3">
<input type="radio" name="q1" id="o3" value="3" onClick="redirect()"/>  <span>test2</span>
','<span id="ans4"><input type="radio" name="q1" id="o4" value="4" onClick="redirect()"/>  <span>test3</span>');
shuffle($answer1);

$answer2 = array('<span id="ans11"><input type="radio" name="q1" id="o11" value="1" onClick="redirect2()"/>  <span>test</span>','<span id="ans12"><input type="radio" name="q1" id="o12" value="2" onClick="redirect2()"/>  <span>test1</span>
','<span id="ans13"><input type="radio" name="q1" id="o13" value="3" onClick="redirect2()"/>  <span>test3</span>','<span id="ans14"><input type="radio" name="q1" id="o14" value="4" onClick="redirect2()"/>  <span>test4</span>');
shuffle($answer2);


$answer3 = array('<span id="ans21"><input type="radio" name="q1" id="o21" value="1" onClick="redirect3()"/>  <span>test</span>','<span id="ans22"><input type="radio" name="q1" id="o22" value="2" onClick="redirect3()"/>  <span>test1</span>','<span id="ans23"><input type="radio" name="q1" id="o23" value="3" onClick="redirect3()"/>  <span>test12</span>','<span id="ans24"><input type="radio" name="q1" id="o24" value="4" onClick="redirect3()"/>  <span>test2</span>');
shuffle($answer3);


$answer4 = array('<span id="ans31"><input type="radio" name="q1" id="o31" value="1" onClick="redirect4()"/>  <span>test</span>','<span id="ans32"><input type="radio" name="q1" id="o32" value="2" onClick="redirect4()"/>  <span>test1</span>','<span id="ans33"><input type="radio" name="q1" id="o33" value="3" onClick="redirect4()"/>  <span>test2</span>','<span id="ans34"><input type="radio" name="q1" id="o34" value="4" onClick="redirect4()"/>  <span>test3</span>');
shuffle($answer4);


$answer5 = array('<span id="ans41"><input type="radio" name="q1" id="o41" value="1" onClick="redirect5()"/>  <span>test</span>','<span id="ans42"><input type="radio" name="q1" id="o42" value="2" onClick="redirect5()"/>  <span>test3</span>','<span id="ans43"><input type="radio" name="q1" id="o43" value="3" onClick="redirect5()"/>  <span>test31</span>','<span id="ans44"><input type="radio" name="q1" id="o44" value="4" onClick="redirect5()"/>  <span>test32</span>');
shuffle($answer5);

$question = array('<div class="form-group"> 
<h3>Ques1 : How are you 1?</h3></div><br><br>
'.$answer1[0].'</span><br><br>
'.$answer1[1].'</span><br><br>
'.$answer1[2].'</span><br><br>
'.$answer1[3].'</span><br><br>
','<div class="form-group"> 
<h3>Ques2 : How are you 2?</h3></div><br><br>
'.$answer2[0].'</span><br><br>
'.$answer2[1].'</span><br><br>
'.$answer2[2].'</span><br><br>
'.$answer2[3].'</span><br><br>
','<div class="form-group"> 
<h3>Ques3 : How are you 3?</h3></div><br><br>
'.$answer3[0].'</span><br><br>
'.$answer3[1].'</span><br><br>
'.$answer3[2].'</span><br><br>
'.$answer3[3].'</span><br><br>
','<div class="form-group"> 
<h3>Ques4 : How are you 4?</h3></div><br><br>
'.$answer4[0].'</span><br><br>
'.$answer4[1].'</span><br><br>
'.$answer4[2].'</span><br><br>
'.$answer4[3].'</span><br><br>
','<div class="form-group"> 
<h3>Ques5 : How are you 5?</h3></div><br><br>
'.$answer5[0].'</span><br><br>
'.$answer5[1].'</span><br><br>
'.$answer5[2].'</span><br><br>
'.$answer5[3].'</span><br><br>
');
if(isset($_GET['ret'])){
shuffle($question);
}?>

<?php if(!isset($_GET['q'])){
echo $question[0];
}elseif($_GET['q']==2){ 
echo $question[1];
}elseif($_GET['q']==3){ 
echo $question[2]; 
}elseif($_GET['q']==4){ 
echo $question[3]; 
} elseif($_GET['q']==5){
echo $question[4]; 
} 
?>    

<script type="text/javascript">
var delayInMilliseconds = 2000; //2 second
function redirect()
{
if(document.getElementById("o1").checked == true || document.getElementById("o2").checked == true || document.getElementById("o3").checked == true || document.getElementById("o4").checked == true)
var r=0;
if(document.getElementById("o1").checked == true){
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
let r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;


if(r=='null'){ r=0;}
const res=+r+1;
document.getElementById("ans1").style.backgroundColor = 'green';
document.getElementById("ans1").style.color = 'white';
setTimeout(function() {
if(flag==5){
window.location.href = 'result.php?r=' + res;
}else{
window.location.href = 'dashboard.php?q=2&r=' + res + '&f=' + flag; 
}

}, delayInMilliseconds);
}else{
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
var r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;

if(document.getElementById("o2").checked == true){
document.getElementById("ans2").style.backgroundColor = 'red';
document.getElementById("ans2").style.color = 'white';
}
if(document.getElementById("o3").checked == true){
document.getElementById("ans3").style.backgroundColor = 'red';
document.getElementById("ans3").style.color = 'white';
}
if(document.getElementById("o4").checked == true){
document.getElementById("ans4").style.backgroundColor = 'red';
document.getElementById("ans4").style.color = 'white';
}
setTimeout(function() {
if(flag==5){
window.location.href = 'result.php?r=' + r;
}else{
window.location.href = 'dashboard.php?q=2&r=' + r + '&f=' + flag;
}

}, delayInMilliseconds);
}
}

function redirect2()
{
if(document.getElementById("o11").checked == true || document.getElementById("o12").checked == true || document.getElementById("o13").checked == true || document.getElementById("o14").checked == true)
if(document.getElementById("o11").checked == true){
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
let r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;

if(r=='null'){ r=0;}
const res=+r+1;
document.getElementById("ans11").style.backgroundColor = 'green';
document.getElementById("ans11").style.color = 'white';
setTimeout(function() {
if(flag==5){
window.location.href = 'result.php?r=' + res;
}else{
window.location.href = 'dashboard.php?q=3&r=' + res  + '&f=' + flag; 
}
}, delayInMilliseconds);

}else{
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
var r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;

if(document.getElementById("o12").checked == true){
document.getElementById("ans12").style.backgroundColor = 'red';
document.getElementById("ans12").style.color = 'white';
}
if(document.getElementById("o13").checked == true){
document.getElementById("ans13").style.backgroundColor = 'red';
document.getElementById("ans13").style.color = 'white';
}
if(document.getElementById("o14").checked == true){
document.getElementById("ans14").style.backgroundColor = 'red';
document.getElementById("ans14").style.color = 'white';
}

setTimeout(function() {
if(flag==5){
window.location.href = 'result.php?r=' + r;
}else{
window.location.href = 'dashboard.php?q=3&r='+ r  + '&f=' + flag; 
}
}, delayInMilliseconds);
}
}

function redirect3()
{
if(document.getElementById("o21").checked == true || document.getElementById("o22").checked == true || document.getElementById("o23").checked == true || document.getElementById("o24").checked == true)
if(document.getElementById("o21").checked == true){
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
let r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;

if(r=='null'){ r=0;}
const res=+r+1;
document.getElementById("ans21").style.backgroundColor = 'green';
document.getElementById("ans21").style.color = 'white';
setTimeout(function() {
if(flag==5){
window.location.href = 'result.php?r=' + res;
}else{
window.location.href = 'dashboard.php?q=4&r=' + res  + '&f=' + flag;  
}

}, delayInMilliseconds);
}else{
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
var r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;

if(document.getElementById("o22").checked == true){
document.getElementById("ans22").style.backgroundColor = 'red';
document.getElementById("ans22").style.color = 'white';
}
if(document.getElementById("o23").checked == true){
document.getElementById("ans23").style.backgroundColor = 'red';
document.getElementById("ans23").style.color = 'white';
}
if(document.getElementById("o24").checked == true){
document.getElementById("ans24").style.backgroundColor = 'red';
document.getElementById("ans24").style.color = 'white';
}
setTimeout(function() {
if(flag==5){
window.location.href = 'result.php?r=' + r;
}else{
window.location.href = 'dashboard.php?q=4&r='+ r  + '&f=' + flag; 
}

}, delayInMilliseconds);
}
}

function redirect4()
{
if(document.getElementById("o31").checked == true || document.getElementById("o32").checked == true || document.getElementById("o33").checked == true || document.getElementById("o34").checked == true)

if(document.getElementById("o31").checked == true){
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
let r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;

if(r=='null'){ r=0;}
const res=+r+1;
document.getElementById("ans31").style.backgroundColor = 'green';
document.getElementById("ans31").style.color = 'white';
setTimeout(function() {
if(flag==5){
window.location.href = 'result.php?r=' + res;
}else{
window.location.href = 'dashboard.php?q=5&r=' + res + '&f=' + flag;  
}
}, delayInMilliseconds);
}else{
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
var r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;

if(document.getElementById("o32").checked == true){
document.getElementById("ans32").style.backgroundColor = 'red';
document.getElementById("ans32").style.color = 'white';
}
if(document.getElementById("o33").checked == true){
document.getElementById("ans33").style.backgroundColor = 'red';
document.getElementById("ans33").style.color = 'white';
}
if(document.getElementById("o34").checked == true){
document.getElementById("ans34").style.backgroundColor = 'red';
document.getElementById("ans34").style.color = 'white';
}
setTimeout(function() {
if(flag==5){
window.location.href = 'result.php?r=' + r;
}else{
window.location.href = 'dashboard.php?q=5&r=' + r + '&f=' + flag; 
}

}, delayInMilliseconds);
}
}

function redirect5()
{
if(document.getElementById("o41").checked == true || document.getElementById("o42").checked == true || document.getElementById("o43").checked == true || document.getElementById("o44").checked == true)

if(document.getElementById("o41").checked == true){
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
let r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;

if(r=='null'){ r=0;}
const res=+r+1;
document.getElementById("ans41").style.backgroundColor = 'green';
document.getElementById("ans41").style.color = 'white';
setTimeout(function() {

if(flag==5){
window.location.href = 'result.php?r=' + res; 
}else{
window.location.href = 'dashboard.php?r=' + res + '&f=' + flag;  
}
}, delayInMilliseconds);
}else{
let url = new URL(window.location.href);
let searchParams = new URLSearchParams(url.search);
var r=searchParams.get('r');
let flag=searchParams.get('f');
if(flag=='null' || flag==''){ flag=0;}
flag=+flag+1;

if(document.getElementById("o42").checked == true){
document.getElementById("ans42").style.backgroundColor = 'red';
document.getElementById("ans42").style.color = 'white';
}
if(document.getElementById("o43").checked == true){
document.getElementById("ans43").style.backgroundColor = 'red';
document.getElementById("ans43").style.color = 'white';
}
if(document.getElementById("o44").checked == true){
document.getElementById("ans44").style.backgroundColor = 'red';
document.getElementById("ans44").style.color = 'white';
}
setTimeout(function() {
if(flag==5){
window.location.href = 'result.php?r=' + r;
}else{
window.location.href = 'dashboard.php?r=' + r + '&f=' + flag;  
}

}, delayInMilliseconds);
}
}

</script>

<!--<input type="checkbox" id="laneFilter"/>-->
<script> 
// checkbox = document.getElementById("laneFilter");
// checkbox.onclick = function(){ 
//alert('lol');
// };
</script>
</div>
</div>
</div>
</body>
</html>
