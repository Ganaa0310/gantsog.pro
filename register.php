<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include 'connect.php';
		$u_name = $_POST['u_name'];
		$u_email = $_POST['u_email'];
		$u_age = $_POST['u_age'];
		$u_phone = $_POST['u_phone'];
		$u_password = $_POST['u_password'];
		$insert_sql = "INSERT INTO user VALUES(NULL,'$u_name','$u_email','$u_age','$u_phone','$u_password','user')";
		$result = mysqli_query($conn,$insert_sql);
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
        <title>sign up</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		<link rel="stylesheet" href="login.css">
		<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="home.css">
    </head>
    <body class="dk">
	<?php include 'header.php'?>
	<form method="POST" action="register.php">
		<div data-aos="zoom-in" data-aos-duration="2000" class="dav">
			<h1>register</h1>
			<p>user name</p>
			<input type="text" name="u_name" class="u_name" class="form-control">
			<p>email</p>
			<input type="email" name="u_email" class="u_email" class="form-control">
			<p>user age</p>
			<input type="number" name="u_age" class="u_age" class="form-control">
			<p>user phone</p>
			<input type="text" name="u_phone" class="u_phone" class="form-control">
			<p>password must have 10 </p>
			<input type="password" name="u_password" class="u_password" class="form-control">
			<br>
			<br>
			<button type="submit" class="mt-3 btn btn-primary">sign in</button>
			<button type="submit" class="mt-3 btn btn-primary"><a href="login.php" class="seconda">log in</a></button>
		</div>
	</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Yv																																											pcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
          </script>
    </body>
</html>