<?php 
include('functions/function.php');
$obj = new User();
if(isset($_POST['gradesub'])){
$arr = $obj->gradesubmit($_POST);
}
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></head>
   <body>
      <div class="wrapper-student">
         <div class="title-text">
            <div class="title login">
               Student Details
            </div>
         </div>
         <div class="form-group"> <br>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Select</button><br>
         <br><span id="student_details"></span>

<br><table class="table table-responsive" width="100%" id="default">
    <thead>
  
   <tr>
      <td><b>#</b></td>
      <td><b>Name</b></td>
      <td><b>email</b></td>
      <td><b>Select grade</b></td>
      <td><b>Action</b></td>
   </tr>
</thead>
<?php

$query11 = mysqli_query($conn,"SELECT * FROM student");
if (mysqli_num_rows($query11) > 0) { $i=1;
while($user = mysqli_fetch_assoc($query11)) { 


?>
   <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $user['name'];?></td>
      <td><?php echo $user['email'];?></td>
      <form class="login" method="post" action="" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $user['id'];?>">
      <td><table>
         <tr>
            <td>
               <input type="radio" name="grade"  value="U" <?php if($user['grade']=='Yes'){ ?> checked="" <?php } ?>/><span> U</span>
            </td>
            <td>
               <input type="radio" name="grade"  value="F" <?php if($user['grade']=='F'){ ?> checked="" <?php } ?>/><span> F</span>
           </td>
            <td>
               <input type="radio" name="grade"  value="G" <?php if($user['grade']=='G'){ ?> checked="" <?php } ?>/><span> G</span>
            </td>
            <td>
               <input type="radio" name="grade"  value="V" <?php if($user['grade']=='V'){ ?> checked="" <?php } ?>/><span> V</span>
           </td>
            <td>
               <input type="radio" name="grade"  value="E" <?php if($user['grade']=='E'){ ?> checked="" <?php } ?>/><span> E</span>
            </td>
            <td>
               <input type="radio" name="grade"  value="N" <?php if($user['grade']=='N'){ ?> checked="" <?php } ?>/><span> N</span>
           </td>
         </tr>
      </table></td>
      <td><input type="submit" class="btn btn-success" value="Submit" name="gradesub"></td>
   </form>
   </tr>
<?php $i++; } } else { ?>

   <tr>
      <td>No record found</td> 
   </tr>
<?php } ?>
</table>

</div>
 <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select options</h4>
        </div>
        <div class="modal-body">
          <table class="table table-responsive" width="100%">
    <thead class="Success">
  
   <tr>
      <td><b>#</b></td>
      <td><b>Name</b></td>
      <td><b>email</b></td>
      <td><b>class</b></td>
      <td><b>Action</b></td>
   </tr>
</thead>

<?php

$query11 = mysqli_query($conn,"SELECT * FROM student");
if (mysqli_num_rows($query11) > 0) { $i=1;
while($user = mysqli_fetch_assoc($query11)) { 
?>
   <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $user['name'];?></td>
      <td><?php echo $user['email'];?></td>
      <td><?php echo $user['class'];?></td>
      <td><input type="checkbox" name="users" value="<?php echo $user['id'];?>"/><span> test</span></td>
    </tr>
<?php $i++; } }?>

   </table>
      </div>
        <div class="modal-footer">
          <button id="btnDel" type="button" class="btn btn-success" data-dismiss="modal">Select</button>
        </div>
      </div>
      
    </div>
  </div>
  <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function(){

 $('#btnDel').click(function(){
            var favorite = [];
            $.each($("input[name='users']:checked"), function(){
                favorite.push($(this).val());
            });
            var users=favorite.join(", ");
 // AJAX request
   $.ajax({
    url: 'ajax.php',
    type: 'post',
    data: {users: users},
    success: function(response){ 
      // Add response in Modal body
      $('#student_details').html(response);
        $("#default").hide();


      // Display Modal
     // $('#empModal').modal('show'); 
    }
  });
 });
});

    
</script>
      </div>
   </body>
</html>