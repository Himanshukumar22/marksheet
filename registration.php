<?php 
include('functions/function.php');
$obj = new User();
if(isset($_POST['student_form'])){
$arr = $obj->student_submit($_POST);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Marksheet</title>
      <link rel="stylesheet" href="css/main.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Registration form
            </div>
         </div>
         <div class="form-container">
            <div class="form-inner">
               <form class="login" method="post" action="" enctype="multipart/form-data">
                  <div class="field">
                     <input type="text" name="student_name" value="" placeholder="Enter name" required>
                  </div>
                  <div class="field">
                     <input type="number" name="roll_no" value="" placeholder="Roll No" required>
                  </div>
                  <div class="field">
                     <input type="number" name="class" value="" placeholder="class" required>
                  </div>
                  <div class="field">
                     <input type="file" name="profile_img" value="" required>
                  </div>
                  <div class="field">
                     <input type="number" name="phone_no" value="" placeholder="phone number" required>
                  </div>
                  <div class="field">
                     <input type="email" name="email" value="" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="UserPassword" placeholder="password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="student_form" value="Submit">
                  </div>
                </form>
            </div>
         </div>
      </div>
   </body>
</html>