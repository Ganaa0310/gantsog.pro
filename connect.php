<?php
	$host='localhost';
	$user='root';
	$pass='';
	$db='cm1';
	$conn = mysqli_connect($host,$user,$pass,$db);
	if($conn){
		//echo 'Successfully connected';
	}else{
		echo mysqli_error($conn);
	}
?>