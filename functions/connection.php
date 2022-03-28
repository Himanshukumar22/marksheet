<?php
	function connect(){
        $con = mysqli_connect('localhost', 'root', '', 'marksheet');
		return $con;
   }
?>
