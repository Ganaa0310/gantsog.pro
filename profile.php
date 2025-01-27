
<?php
	include 'check.php';
    session_start();
	$u_id=$_SESSION['u_id'];
    include 'connect.php';
    $select_sql="SELECT*FROM user WHERE u_id='$u_id'";
    $result= mysqli_query($conn, $select_sql);
    $user=mysqli_fetch_all($result, MYSQLI_ASSOC);
		
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="pro.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="home.css">
</head>
<body>
<?php include 'header.php'?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="first">
                                <div class="img1"><img src="<?php echo $user[0]['u_logo'] ?>" alt="">
								</div>
                                <div class="pp">
                                    <div class="row">
                                        <div class="col-md-5">
											<div class="name">
												<h2><?php echo $user[0]['u_name']?></h2>
											</div>
                                            <h3>Profile info</h3>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="btn1">
                                                <button class="btn btn-danger-soft">
                                               <a href="pro_edit.php"><h1><i class="bi bi-pencil-fill"></i>edit profile</h1></a>
                                                </button>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="icons">
									<i class="bi bi-arrow-through-heart">Name:<?php echo $user[0]['u_name']?></i>
								</div>
							</div>
							<div class="col-md-6">
								<div class="icons">
									<i class="bi bi-geo-alt">Phone:<?php echo $user[0]['u_phone']?></i>
								</div>
							</div>
							<br>
							<br>
							<div class="col-md-6">
								<div class="icons2">
									<i class="bi bi-briefcase-fill">Email:<?php echo $user[0]['u_email']?></i>
								</div>
							</div>
							<div class="col-md-6">
								<div class="icons2">
									<i class="bi bi-geo-alt">Age:<?php echo $user[0]['u_age']?></i>
								</div>
							</div>
							<div class="col-md-6">
								<div class="icons2">
									<p><a href="logout.php">Log out</a></p>
								</div>
							</div>
                        </div>
					</div>
                   </div>
				</div>
			</div>
            </div>
        </div>
		<div class="container">
			<div class="pro">
			<div class="row">
			</div>
			</div>
		</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>