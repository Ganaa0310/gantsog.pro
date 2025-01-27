<?php
	session_start();
	include 'connect.php';
	$id = $_GET['deleteId'];
	if(isset($id)){
		$delete_query = "DELETE FROM chatroom WHERE ch_id=$id;";
		$result = mysqli_query($conn,$delete_query);
		if($result){
			header('location:d_chats.php');
		}else{
			echo mysqli_error($conn);
		}
	}
?>