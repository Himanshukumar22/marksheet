<?php 
session_start();
session_regenerate_id(true);
include('functions/function.php');
$obj = new User();
if(isset($_POST['loginSubmit'])){
$arr = $obj->loginUser($_POST);
}
if(isset($_POST['regSubmit'])){
$arr = $obj->regUsers($_POST);
}
if(isset($_SESSION['LoginUserType'])){
session_destroy();
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
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form class="login" method="post" action="" enctype="multipart/form-data">
                  <div class="field">
                     <input type="email" name="useremail" value="" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input name="UserPassword" type="password" value="" placeholder="Password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="loginSubmit" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form  method="post" action="" enctype="multipart/form-data" class="signup">
                  <div class="field">
                     <input type="text" name="username" value="" placeholder="Name" required>
                  </div>
                  <div class="field">
                     <input type="text"  name="useremail" value=""  placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="UserPassword" value="" placeholder="Password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input name="regSubmit" type="submit" value="Signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>