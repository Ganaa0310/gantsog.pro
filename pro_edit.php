<?php
	session_start();
	include 'connect.php';
	$id=$_SESSION['u_id'];
	$select_sql="SELECT*FROM user WHERE u_id='$id'";
	$result= mysqli_query($conn, $select_sql);
	if($result){
		echo 'yes';
		$user= mysqli_fetch_all($result, MYSQLI_ASSOC);
		//print_r($user[0]['u_id']);
		$name=$user[0]['u_name'];
		$email=$user[0]['u_email'];
		$age=$user[0]['u_age'];
		$phone=$user[0]['u_phone'];
		$password=$user[0]['u_password'];
		$logo=$user[0]['u_logo'];
	}else{
		mysqli_error($conn);
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$u_name=$_POST['u_name'];
		$u_email=$_POST['u_email'];
		$u_age=$_POST['u_age'];
		$u_phone=$_POST['u_phone'];
		$u_password = $_POST['u_password'];
		$u_logo = $_POST['u_logo'];
		$u_logo=null;
		if(isset($_FILES['u_logo'])){
			$folder='upload/';
			$u_logoName=basename($_FILES['u_logo'] ['name']);
			$u_logo = $folder . $u_logoName;
			echo $u_logo;
			move_uploaded_file($_FILES['u_logo']['tmp_name'], $u_logo);
		}else{
			echo "No u_logo uploaded";
		}
		$update_sql="UPDATE user SET u_name='$u_name',u_email='$u_email', u_age='$u_age',u_phone='$u_phone',u_password='$u_password',u_logo='$u_logo' WHERE u_id='$id'";
		$result= mysqli_query($conn, $update_sql);
		if($result){
			header('location:profile.php');
		}else{
			echo mysqli_error($conn);
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="pro_edit.css">
	</head>
	<body>
		<?php include 'header.php'?>
		<div class="col-md-9">
			<form method="POST" enctype="multipart/form-data">
				<label>Profile picture</label>
				<input class="form-control" type="file" name="u_logo">
                <img src="<?php echo $user[0]['u_logo'] ?>" name="u_logo" width="50px" alt="">
                <br>
				<label>User name</label>
				<input class="form-control" type="name" name="u_name" value="<?php echo $name ?>">
				<label>Email</label>
				<input class="form-control" type="email" name="u_email" value="<?php echo $email ?>">
				<label>Age</label>
				<input class="form-control" type="number" name="u_age" value="<?php echo $age ?>">
				<label>Phone</label>
				<input class="form-control" type="number" name="u_phone" value="<?php echo $phone ?>">
				<label>Password</label>
				<input class="form-control" type="number" name="u_password" value="<?php echo $password ?>">
				<button class="mt-3 btn btn-success" type="submit" >Done</button>
			</form>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</body>
</html>