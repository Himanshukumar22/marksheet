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
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <label for="login" class="slide login">Login</label>
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
                     Not a member? <a href="registration.php">Signup now</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>