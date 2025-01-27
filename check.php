<?php
	
	if(!isset($_SESSION['u_id'])){
		header('location:login.php');
		exit();
	}
?>