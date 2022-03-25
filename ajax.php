<?php
include "functions/connection.php";
$conn=connect();
$users = 0;
if(isset($_POST['users'])){
   $userid = mysqli_real_escape_string($conn,$_POST['users']);
}
$sql = "select * from student where id IN (".$userid.")";
$result = mysqli_query($conn,$sql);

$response = '<table class="table table-responsive" width="100%">
    <thead>
  
   <tr>
      <td><b>#</b></td>
      <td><b>Name</b></td>
      <td><b>email</b></td>
      <td><b>Select grade</b></td>
   </tr>
</thead>';
$i=1;
while($user = mysqli_fetch_assoc($result)) { 

 $response .= "<tr><td>".$i."</td>";
 $response .= "<td>".$user['name']."</td>";
 $response .= "<td>".$user['email']."</td>";
 $response .='<form method="post" action="" enctype="multipart/form-data">
      <td><table>
         <tr>
            <td>
                <input type="hidden" class="uid" name="userid" id="userid" value="'.$user["id"].'">
                <input class="btnclass" type="radio" name="grade" id="U"  value="U" /><span>  U </span>
            </td>
            <td>
               <input class="btnclass" type="radio" name="grade" id="F" value="F"/><span> F</span>
           </td>
            <td>
               <input class="btnclass" type="radio" name="grade" id="G" value="G" /><span> G</span>
            </td>
            <td>
               <input class="btnclass" type="radio" name="grade" id="V" value="V"/><span> V</span>
           </td>
            <td>
               <input class="btnclass" type="radio" name="grade" id="E" value="E" /><span> E</span>
            </td>
            <td>
               <input class="btnclass" type="radio" name="grade" id="N" value="N"/><span> N</span>
           </td><span id="status"></span>
         </tr>
      </table></td>
      </form>
   </tr>';
   $i++; } 


$response .= "</table>";
?>
<script>
          $(document).ready(function(){

 $('.btnclass').click(function(){
var btn = $(this);
btn.prop("disabled", true);
var userid = btn.closest("tr").find("input[name='userid']").val();
var grade=$('input[name="grade"]:checked').val();

   $.ajax({
    url: 'ajax-form.php',
    type: 'post',
    data: {grade: grade,userid:userid},
    dataType: 'json',
    success: function(response){ 
//$("#status").html(response.status);
alert(response.status);
$("#grade").html(response.grade);
        
      }
  });
  });
  });

    
</script>
<?php
echo $response;
exit;