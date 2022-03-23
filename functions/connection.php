<?php
	function connect(){
        $con = mysqli_connect('localhost', 'root', '', 'quiz');
		return $con;
   }
?>
